<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
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
            'site_id' => ['required', 'integer', 'exists:sites,id'],
            'reported_by' => ['required', 'integer', 'exists:users,id'],
            'type' => ['required', 'string', 'in:rapid,storage'],
            'image' => ['required', 'image'],
            'comment' => ['required', 'string', 'min:3'],
            'mobile_sync_id' => ['nullable', 'string', 'min:3'],
        ];

    }
}
