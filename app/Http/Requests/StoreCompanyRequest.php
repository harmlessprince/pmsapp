<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'industry_id' => ['required', 'integer', 'exists:industries,id'],
            'state_id' => ['required', 'integer', 'exists:states,id'],
            'city' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users,email'],
            'display_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'password' => ['required', 'string', 'min:4'],
            'confirm_password' => ['same:password'],
            'address' => ['required', 'string', 'max:200'],
            'maximum_number_of_tags' => ['required', 'integer', 'min:1'],
            'phone_number' =>['required', 'string', 'unique:companies,phone_number'],
            'status' => ['required', 'boolean']
        ];
    }
}
