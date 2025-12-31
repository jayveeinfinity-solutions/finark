<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:thread,poll',
            'title' => 'required|string|max:255',

            // Thread
            'content' => 'required_if:type,thread|nullable|string',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|max:10240',

            // Poll
            'options' => 'required_if:type,poll|array|min:2',
            'options.*.text' => 'required_if:type,poll|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'options.min' => 'A poll must have at least 2 options.',
        ];
    }
}
