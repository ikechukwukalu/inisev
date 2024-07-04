<?php

namespace App\Http\Requests;

class UserPubUpdateRequest extends BaseFormRequest
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
            'id' => 'required|exists:user_pubs,id',
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:2000',
            'active' => 'sometimes|in:0,1'
        ];
    }
}
