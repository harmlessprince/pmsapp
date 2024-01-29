<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiteRequest extends FormRequest
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
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'first_name' => ['required', 'string', 'max:200'],
            'last_name' => ['required', 'string', 'max:200'],
            'status' => ['required', 'boolean'],
            'number_of_tags' => ['required', 'boolean'],
            'maximum_number_of_rounds' => ['required', 'boolean'],
            'logout_pin' => ['required', 'string', 'min:4'],
            'email' => ['required', 'email', 'max:200'],
            'username' => ['required', 'string', 'max:200'],
            'site_name' => ['required', 'string', 'max:200'],
            'password' => ['required', 'string', 'min:4'],
            'password_confirm' => ['same:password'],
            'address' => ['required', 'string', 'max:200'],
            'photo' => ['required', 'string', 'min:4'],
            'attendance_date' => ['required', 'date_format:Y-m-d'],
            'shift_start_time' => ['required', 'date_format:H:i:s'],
            'shift_end_time' => ['required', 'date_format:H:i:s'],
        ];
    }
}
