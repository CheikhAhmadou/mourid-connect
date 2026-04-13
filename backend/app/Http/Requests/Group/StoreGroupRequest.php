<?php

namespace App\Http\Requests\Group;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
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
            'name'        => 'required|string|max:255|unique:groups,name',
            'description' => 'required|string|min:20|max:1000',
            'type'        => 'required|in:country,city,dahira,theme',
            'country'     => 'nullable|string|max:10',
            'city'        => 'nullable|string|max:100',
            'is_private'  => 'nullable|boolean',
            'cover'       => 'nullable|image|mimes:jpg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'   => 'Le nom du groupe est obligatoire',
            'name.unique'     => 'Ce nom de groupe est déjà utilisé',
            'description.min' => 'La description doit faire au moins 20 caractères',
            'type.required'   => 'Le type de groupe est obligatoire',
            'type.in'         => 'Type invalide : country, city, dahira ou theme',
        ];
    }
}
