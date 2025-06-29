<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultipleIncidentRequest extends FormRequest
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
            'incidents' => 'required|array|min:1',
            'incidents.*.site_id' => 'required|exists:sites,id',
            'incidents.*.reported_by' => 'required|exists:users,id',
            'incidents.*.type' => 'required|string|in:rapid,storage',
            'incidents.*.image' => ['required', 'string'],
            'incidents.*.comment' => 'required|string|min:3',
            'incidents.*.mobile_sync_id' => 'nullable|string|min:3',
        ];
    }
}
