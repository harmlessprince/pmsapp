<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
            'tag_name' => ['required', 'string'],
            'site' => ['required', 'integer', 'exists:sites,id'],
            'longitude' => ['nullable', 'numeric'],
            'latitude' => ['nullable', 'numeric'],
            'comment' => ['nullable', 'string', 'max:200']
        ];
        if (request()->user()->isCompanyOwner()){
            return $data;
        }
        return [
                'company_id' => ['required', 'integer', 'exists:companies,id'],
            ] + $data;
    }
}
