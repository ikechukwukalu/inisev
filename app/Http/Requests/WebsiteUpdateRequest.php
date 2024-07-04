<?php

namespace App\Http\Requests;

class WebsiteUpdateRequest extends BaseFormRequest
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
            'id' => 'required|exists:websites,id',
            'name' => 'required|string|max:150',
            'url' => 'required|url',
            'active' => 'sometimes|in:0,1'
        ];
    }
}
