<?php

namespace App\Http\Requests;

use App\Enums\AttendanceActionTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreScanRequest extends FormRequest
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
            'scan_date' => ['required', 'date_format:Y-m-d'],
            'scan_date_time' => ['required', 'date_format:Y-m-d H:i:s'],
            'scan_time' => ['required', 'date_format:H:i:s'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'tag_code' => ['required', 'string']
        ];
    }
}
