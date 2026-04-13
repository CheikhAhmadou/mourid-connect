<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $post = $this->route('post');
        return auth()->id() === $post->user_id;
    }

    public function rules(): array
    {
        return [
            'content'  => 'required|string|min:1|max:5000',
            'location' => 'nullable|string|max:255',
        ];
    }
}
