<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegionRequest extends FormRequest
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
        $data = [
            'email' => ['required', 'email', 'max:200', Rule::unique('users', 'email')],
            'status' => ['required', 'boolean'],
            'region_name' => ['required', 'string', 'max:200'],
            'sites' => ['required', 'array'],
            'logout_pin' => ['required', 'string'],
        ];
        if (request()->user()->isCompanyOwner()) {
            return $data;
        }
        return [
                'company_id' => ['required', 'integer', 'exists:companies,id'],
            ] + $data;
    }
}
