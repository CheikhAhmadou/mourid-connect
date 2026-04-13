<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\ValidationRule;
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

    public function rules(): array
    {
        return [
            'content'  => 'required|string|min:1|max:5000',
            'type'     => 'nullable|in:text,photo,event,announcement,help',
            'group_id' => 'nullable|exists:groups,id',
            'location' => 'nullable|string|max:255',
            'images'   => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Le contenu du post est obligatoire',
            'content.max'      => 'Le post ne peut pas dépasser 5000 caractères',
            'images.max'       => '5 photos maximum par post',
            'images.*.image'   => 'Le fichier doit être une image',
            'images.*.max'     => 'Chaque image ne doit pas dépasser 2MB',
            'group_id.exists'  => "Ce groupe n'existe pas",
        ];
    }
}
