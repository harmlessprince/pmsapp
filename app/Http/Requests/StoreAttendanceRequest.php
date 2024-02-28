<?php

namespace App\Http\Requests;

use App\Enums\AttendanceActionTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAttendanceRequest extends FormRequest
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
//        'time_input' => 'required|date_format:H:i:s|after:08:59:59|before:17:00:00',
        return [
            'action_type' => ['required', 'string', Rule::in([AttendanceActionTypeEnum::CHECK_IN->value, AttendanceActionTypeEnum::CHECK_OUT->value])],
            'image' => ['required', 'image'],
            'comment' => ['nullable', 'string', 'max:500'],
            'security_guard_id' => ['required', 'integer', 'exists:users,id'],
            'attendance_date' => ['required', 'date_format:Y-m-d'],
            'attendance_time' => ['required', 'date_format:H:i:s'],
            'attendance_date_time' => ['required', 'date_format:Y-m-d H:i:s'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
        ];
    }
}
