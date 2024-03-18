<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
            'industry_id' => ['sometimes', 'integer', 'exists:industries,id'],
            'state_id' => ['sometimes', 'integer', 'exists:states,id'],
            'city' => ['sometimes', 'string'],
            'email' => ['sometimes', 'string', Rule::unique('users', 'email')->ignore(request()->company->owner->id)],
            'display_name' => ['sometimes', 'string'],
            'first_name' => ['sometimes', 'string'],
            'last_name' => ['sometimes', 'string'],
            'password' => ['sometimes', 'string', 'min:4'],
            'confirm_password' => ['same:password'],
            'address' => ['sometimes', 'string', 'max:200'],
            'maximum_number_of_tags' => ['sometimes', 'integer', 'min:1'],
            'phone_number' =>['sometimes', 'string', Rule::unique('companies', 'phone_number')->ignore(request()->company->id)],
            'status' => ['sometimes', 'boolean']
        ];
    }
}
