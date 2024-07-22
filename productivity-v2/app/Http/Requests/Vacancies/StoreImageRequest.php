<?php

namespace App\Http\Requests\Vacancies;

use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            'status_id' => Status::where('id', 1)->value('id'),
            'user_id' => Auth::user()->id,
            'description' => $this['result'],
            'vacancy_id' => $this['id']
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
            'user_id' => 'required|integer|exists:users,id',
            'vacancy_id' => 'required|integer|exists:vacancies,id',
            "salary" => "nullable|string|max:255",
            "recruiter_email" => "nullable|string|max:255",
            "more_information" => "nullable|string",
            'status_id' => "required|integer|exists:statuses,id",
            'description' => "required|string|min:10|max:280",
            'erp_vacancy_id' => 'required|integer',
            'link' => 'required|string|max:500|min:3',
            'filename' => "required|string",
            'filepath' => "required|string",
        ];
    }
}
