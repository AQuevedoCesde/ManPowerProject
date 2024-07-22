<?php

namespace App\Http\Requests\Vacancies;

use Illuminate\Foundation\Http\FormRequest;

class GenerateImageRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => "required|exists:categories,id|integer",
            'category' => 'required',
            'id' => 'required|integer|exists:vacancies,id',
            'city' => 'required|array',
            'position' => 'required|string|min:3',
            'erp_vacancy_id' => 'required|integer',
            'link' => 'required|string|max:500|min:3',
            'salary' => 'nullable|string|min:3',
            "recruiter_email" => 'nullable|string',
            "more_information" => 'nullable|string',
            'result' => 'required|string',
        ];
    }
}
