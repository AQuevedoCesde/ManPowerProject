<?php

namespace App\Http\Requests\Backlog;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            // 'status_id' => Bkl::where('id', 1)->value('id'),

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
            'name' => 'required|string|max:255',
            'css' => 'nullable|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'bkl_state_id' => 'required|integer|exists:bkl_states,id',
            'taking_action' => 'required|integer',
            'situation' => 'string',
            'bkl_role_id' => 'required|integer|exists:bkl_roles,id',
            'bkl_area_id' => 'required|integer|exists:bkl_areas,id',
            'bkl_management_id' => 'required|integer|exists:bkl_managements,id',
            'client' => 'required|string|max:255',
            'bkl_type_id' => 'required||integer|exists:bkl_types,id',
            'deadline' => 'required|date',
            'bkl_priority_id' => 'required|integer|exists:bkl_priorities,id',
            'description' => 'required|string',
        ];
    }
}
