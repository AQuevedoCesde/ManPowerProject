<?php

namespace App\Http\Requests\Vacancies;

use App\Models\Status;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'category_id' => "required|exists:categories,id|integer",
            'position' => "required|string|max:255",
            'department_id' => "required|integer|exists:states,id",
            'city_id' => "required|integer|exists:cities,id",
            "description" => "required|string|min:10|max:300",
            'erp_vacancy_id' => 'required|integer',
            'link' => 'required|string|max:300|min:3',
            "salary" => "nullable|string|max:255",
            'status_id' => "required|integer|exists:statuses,id",
        ];
    }
}
