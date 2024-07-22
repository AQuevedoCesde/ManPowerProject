<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Vacancy;
use App\Helpers\Helpers;
use App\Models\MediaFile;
use App\Models\VacancyImage;
use App\Services\ImageService;
use App\Services\OpenAIService;
use App\Masivian\Email\EmailApi;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageGenerationService;
use App\Http\Requests\Vacancies\StoreImageRequest;
use App\Http\Requests\Vacancies\CompletionsRequest;
use App\Http\Requests\Vacancies\RejectImageRequest;
use App\Http\Requests\Vacancies\UpdateImageRequest;
use App\Http\Requests\Vacancies\ApproveImageRequest;
use App\Http\Requests\Vacancies\GenerateImageRequest;

class VacancieSocialController extends Controller
{
    protected $openAIService;

    protected $imageGenerationService;

    public function __construct(OpenAIService $openAIService, ImageGenerationService  $imageGenerationService)
    {
        $this->openAIService = $openAIService;

        $this->imageGenerationService = $imageGenerationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vacancy $vacancy)
    {
        $this->authorize('image', $vacancy);

        return Inertia::render('Vacancies/Social/SocialNetworks', [
            'vacancy' => $vacancy->loadMissing('city', 'city.state', 'status', 'category')
        ]);
    }

    /**
     * Get data from AI
     */
    public function completions(CompletionsRequest $request)
    {
        $this->authorize('completions', new VacancyImage);

        $data = $request->validated();

        try {
            $apiData = [
                "model" => "gpt-4",
                'messages' => [
                    [
                        "role" => "user",
                        "content" => trim($data['body']),
                    ]
                ],
                'temperature' => 0.5,
                "max_tokens" => 200,
                "top_p" => 1.0,
                "frequency_penalty" => 0.52,
                "presence_penalty" => 0.5,
                "stop" => ["11."],
            ];

            $response = $this->openAIService->getCompletions($apiData);

            if (isset($response['error'])) {
                return response()->json($response['error'], 500);
            }

            return response()->json($response['choices'][0], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Process data and generate a image file
     */
    public function generate(GenerateImageRequest $request)
    {
        $this->authorize('generate', new VacancyImage);

        try {
            $factories = config('image.companies');
            $company  = 'manpowergroup';
            $vacancy = $request->validated();

            if (!array_key_exists($company, $factories)) {
                return response()->json(['error' => 'Empresa no reconocida.'], 404);
            }

            $factoryClass = $factories[$company];
            $factory = App::make($factoryClass);

            $imageService = new ImageService($factory);
            $image = $imageService->generateImage($vacancy);

            return response()->json($image, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Save image and update vacancy
     */
    public function store(StoreImageRequest $request)
    {
        $this->authorize('create', new VacancyImage);

        $data = $request->validated();

        $vacancy = Vacancy::findOrFail($data['vacancy_id']);

        $vacancy->vacancyImages()->create($data);

        $subject = 'Nueva pieza de marketing pendiente de aprobación para la vacante: ' . $vacancy->position;
        $recipients = Helpers::getNotificationEmail(1);
        $view = 'emails.vacancies.review-graphic';
        $data = [
            'message' => Auth::user()->name . ' acaba de crear una nueva publicación para las redes sociales relacionada con la vacante de "' . $vacancy->position . '". Te invitamos cordialmente a revisarla y, si es necesario, seguir el enlace adjunto para aprobar la pieza gráfica. ¡Gracias por tu colaboración!.',
            'link' => route('vacancies.show', $vacancy->id),
        ];
        EmailApi::sendEmail($subject, $recipients, $view, $data);

        return redirect()->route('vacancies.index')->with('message', 'La pieza gráfica se ha creado exitosamente. Por favor, espera a que sea aprobada por el área de marketing.');
    }

    /**
     * Edit a vacancie image template
     */
    public function edit(VacancyImage $vacancyImage)
    {
        $this->authorize('update', $vacancyImage);

        $vacancyImage = $vacancyImage->loadMissing('vacancy');
        $mediafiles = MediaFile::where('category_id', $vacancyImage->vacancy->category_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Vacancies/UpdateTemplate', [
            'vacancyImage' => $vacancyImage,
            'mediaFiles' => $mediafiles
        ]);
    }

    /**
     * Update a vacancie image template
     */
    public function update(UpdateImageRequest $request, VacancyImage $vacancyImage)
    {
        $this->authorize('update', $vacancyImage);

        try {

            if ($vacancyImage->status_id == 2 || $vacancyImage->status_id == 3) {
                return redirect()->back()->with('message', 'La pieza gráfica ha sido revisada previamente y no se permite realizar más modificaciones.');
            }

            $factories = config('image.companies');
            $company = 'manpowergroup';
            $vacancy = Vacancy::with('city', 'city.state', 'status', 'category')->findOrFail($vacancyImage->vacancy_id);
            $vacancy->result = $vacancyImage->description;
            $data = $request->validated();

            $factoryClass = $factories[$company];
            $factory = App::make($factoryClass);

            $imageService = new ImageService($factory);
            $image = $imageService->generateImage($vacancy, $data['template_image']);

            $vacancyImage->update([
                'filename' => $image['filename'],
                'filepath' => $image['filepath']
            ]);

            return redirect()->route('vacancies.show', $vacancy->id)->with('message', '¡Pieza gráfica actualizada con éxito!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', 'Ocurrio un error. ' . $th->getMessage());
        }
    }

    /**
     * Approve image generation
     */
    public function approve(ApproveImageRequest $request)
    {
        $this->authorize('approve', new VacancyImage);

        $data = $request->validated();

        $vacancy = Vacancy::findOrFail($data['vacancy_id']);
        $vacancy->update(['status_id' => $data['status_id']]);

        $vacancy_image = VacancyImage::findOrFail($data['id']);
        $vacancy_image->update([
            'status_id' => $data['status_id'],
            'reason' => $data['reason']
        ]);

        $user = User::find($vacancy_image->user_id);

        $subject = 'Tu pieza gráfica para la vacante "' . $vacancy->position . '" ha sido aprobada';
        $recipients = [$user->email];
        $view = 'emails.vacancies.approve-graphic';
        $data = [
            'fullname' => $user->name,
            'position' => $vacancy->position,
            'reason' => $data['reason'],
            'link' => route('vacancies.show', $vacancy->id),
        ];
        EmailApi::sendEmail($subject, $recipients, $view, $data);

        return redirect()->route('vacancies.show', $vacancy);
    }

    /**
     * Reject image generation
     */
    public function reject(RejectImageRequest $request)
    {
        $this->authorize('reject', new VacancyImage);

        $data = $request->validated();
        $vacancy = Vacancy::findOrFail($data['vacancy_id']);
        $vacancy_image = VacancyImage::findOrFail($data['id']);
        $vacancy_image->update([
            'status_id' => $data['status_id'],
            'reason' => $data['reason'],
        ]);

        $user = User::find($vacancy_image->user_id);

        $subject = 'Tu pieza gráfica para la vacante "' . $vacancy->position . '" ha sido rechazada';
        $recipients = [$user->email];
        $view = 'emails.vacancies.reject-graphic';
        $data = [
            'fullname' => $user->name,
            'position' => $vacancy->position,
            'reason' => $data['reason'],
            'link' => route('vacancies.show', $vacancy->id),
        ];
        EmailApi::sendEmail($subject, $recipients, $view, $data);

        return redirect()->route('vacancies.show', $vacancy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VacancyImage $vacancyImage)
    {
        $this->authorize('delete', $vacancyImage);

        $vacancyImage->delete();
        return redirect()->route('vacancies.show', $vacancyImage->vacancy_id);
    }
}
