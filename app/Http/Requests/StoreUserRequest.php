<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
//        dd(request()->all());
//        dd(request()->all(), Carbon::now()->format("H:ia"));
        $data = [
            'first_name' => ['sometimes', 'string', 'max:200'],
            'last_name' => ['sometimes', 'string', 'max:200'],
            'address' => ['sometimes', 'string', 'max:200'],
            'site_id' => ['sometimes', 'integer', 'exists:sites,id'],
            'state_id' => ['sometimes', 'integer', 'exists:states,id'],
            'phone_number' => ['sometimes', 'string', 'max:20'],
            'shift_start_time' => ['nullable', 'date_format:H:ia', 'max:8'],
            'shift_end_time' => ['nullable', 'date_format:H:ia', 'max:8'],
            'normal_rate_per_hour' => ['nullable', 'numeric'],
            'sunday_rate_per_hour' => ['nullable', 'numeric'],
            'holiday_rate_per_hour' => ['nullable', 'numeric'],
            'number_of_night_shift' => ['nullable', 'integer'],
            'night_shift_allowance' => ['nullable', 'integer'],
            'profile_image' => ['nullable', 'image'],
        ];

        if (request()->user()->isCompanyOwner()) {
            return $data;
        }
        return [
                'company_id' => ['required', 'integer', 'exists:companies,id'],
            ] + $data;
    }
}
