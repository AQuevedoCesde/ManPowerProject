<?php

namespace App\Http\Requests\Notifications;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'emails' => [
                'required',
                function ($attribute, $value, $fail) {
                    $emails = explode(',', $value);

                    foreach ($emails as $email) {
                        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                            $fail('Uno o más correos electrónicos no son válidos.');
                        }
                    }
                },
            ],
        ];
    }
}
