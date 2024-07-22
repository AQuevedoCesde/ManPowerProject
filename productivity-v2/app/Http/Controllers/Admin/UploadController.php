<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Category;
use App\Models\MediaFile;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Multimedia\StoreRequest;
use App\Http\Requests\Multimedia\UpdateRequest;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', new MediaFile);

        $mediafiles = MediaFile::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        return Inertia::render('Vacancies/Uploads/Uploads', [
            'mediafiles' => $mediafiles,
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new MediaFile);

        return Inertia::render('Vacancies/Uploads/Create', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', new MediaFile);

        $images = $request->file('images');

        foreach ($images as $key => $image) {
            if (config('app.env') === 'local') {
                $folder = 'vacancies/templates';
                $filePath = Storage::disk('public')->putFile($folder, $image);
            } else {
                $folder = 'productive-v2/vacancies/templates';
                $filePath = Storage::disk('s3')->put($folder, $image);
            }

            MediaFile::create([
                'name' => $image->getClientOriginalName(),
                'path' => $filePath,
                'category_id' => $request->input('category_id'),
                'color' => $request->input('color'),
            ]);
        }

        return redirect()->route('vacancies.uploads.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, MediaFile $mediaFile)
    {
        $this->authorize('update', $mediaFile);

        if ($request->hasFile('images')) {
            $image = $request->file('images')[0];

            if (config('app.env') === 'local') {
                $folder = 'vacancies/templates';
                $filename =  $image->getClientOriginalName();
                $filePath = Storage::disk('public')->putFile($folder, $image);
                Storage::disk('public')->delete($mediaFile->path);
            } else {
                $folder = 'productive-v2/vacancies/templates';
                $filename =  $image->getClientOriginalName();
                $filePath = Storage::disk('s3')->put($folder, $image);
                Storage::disk('s3')->delete($mediaFile->path);
            }
        }

        $mediaFile->update([
            'name' => isset($filename) ? $filename : $mediaFile->name,
            'path' => isset($filePath) ? $filePath : $mediaFile->path,
            'category_id' => $request->input('category_id'),
            'color' => $request->input('color'),
        ]);

        return redirect()->route('vacancies.uploads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaFile $mediaFile)
    {
        $this->authorize('delete', $mediaFile);

        if (config('app.env') === 'local') {
            Storage::disk('public')->delete($mediaFile->path);
        } else {
            Storage::disk('s3')->delete($mediaFile->path);
        }

        $mediaFile->delete();
        return redirect()->route('vacancies.uploads.index');
    }
}
