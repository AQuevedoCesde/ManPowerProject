<?php

namespace App\Http\Requests\Multimedia;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'color' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'required|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'images.*.mimes' => 'Cada imagen debe tener una extensión png, jpg o jpeg.',
        ];
    }
}
