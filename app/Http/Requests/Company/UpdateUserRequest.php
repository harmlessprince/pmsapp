<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => ['sometimes', 'string', 'max:200'],
            'last_name' => ['sometimes', 'string', 'max:200'],
            'address' => ['sometimes', 'string', 'max:200'],
            'site_id' => ['sometimes', 'integer', 'exists:sites,id'],
            'state_id' => ['sometimes', 'integer', 'exists:states,id'],
            'phone_number' => ['sometimes', 'string', 'max:20'],
            'shift_start_time' => ['nullable', 'string', 'max:10'],
            'shift_end_time' => ['nullable', 'string', 'max:10'],
            'normal_rate_per_hour' => ['nullable', 'numeric'],
            'sunday_rate_per_hour' => ['nullable', 'numeric'],
            'holiday_rate_per_hour' => ['nullable', 'numeric'],
            'number_of_night_shift' => ['nullable', 'integer'],
            'night_shift_allowance' => ['nullable', 'integer'],
            'profile_image' => ['nullable', 'image'],
        ];
    }
}
