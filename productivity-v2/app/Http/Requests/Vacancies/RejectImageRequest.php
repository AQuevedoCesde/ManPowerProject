<?php

namespace App\Http\Requests\Vacancies;

use App\Models\Status;
use Illuminate\Foundation\Http\FormRequest;

class RejectImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'status_id' => Status::where('id', 2)->value('id'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "id" => 'required|integer|exists:vacancy_images,id',
            'vacancy_id' => 'required|integer|exists:vacancies,id',
            'status_id' => "required|integer|exists:statuses,id",
            'reason' => 'nullable|string'
        ];
    }
}
