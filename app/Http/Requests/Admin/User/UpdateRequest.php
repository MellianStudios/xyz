<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->route('user')->id),
                'string',
                'email',
            ],
            'first_name' => [
                'required',
                'string',
            ],
            'last_name' => [
                'required',
                'string',
            ],
            'street' => [
                'nullable',
                'string',
            ],
            'street_number' => [
                'nullable',
                'string',
            ],
            'zip' => [
                'nullable',
                'string',
            ],
            'city' => [
                'nullable',
                'string',
            ],
            'country' => [
                'nullable',
                'string',
            ],
            'phone_number' => [
                'nullable',
                'string',
            ],
            'file' => [
                'nullable',
                'file',
            ],
        ];
    }
}
