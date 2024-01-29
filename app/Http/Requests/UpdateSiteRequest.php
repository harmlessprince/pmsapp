<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteRequest extends FormRequest
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
            'company_id' => ['sometimes', 'integer', 'exists:companies,id'],
            'longitude' => ['sometimes', 'numeric'],
            'latitude' => ['sometimes', 'numeric'],
            'name' => ['sometimes', 'string', 'max:200'],
            'status' => ['sometimes', 'boolean'],
            'logout_pin' => ['sometimes', 'string', 'min:4'],
            'email' => ['sometimes', 'email', 'max:200'],
            'username' => ['sometimes', 'string', 'max:200'],
            'site_name' => ['sometimes', 'string', 'max:200'],
            'password' => ['sometimes', 'string', 'min:4'],
            'password_confirm' => ['same:password'],
            'address' => ['sometimes', 'string', 'max:200'],
            'photo' => ['sometimes', 'string', 'min:4'],
            'attendance_date' => ['sometimes', 'date_format:Y-m-d'],
            'shift_start_time' => ['sometimes', 'date_format:H:i:s'],
            'shift_end_time' => ['sometimes', 'date_format:H:i:s'],
        ];
    }
}
