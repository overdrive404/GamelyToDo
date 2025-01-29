<?php

namespace App\Http\Requests\User\Quest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'difficulty' => 'required|in:easy,normal,hard,extreme',
            'skill_id' => 'nullable|exists:skills,id',
            'characteristics' => 'string|max:255',
        ];
    }
}
