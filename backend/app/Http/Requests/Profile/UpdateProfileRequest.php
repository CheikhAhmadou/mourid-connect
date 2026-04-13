<?php

namespace App\Http\Requests\Profile;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'bio'               => 'nullable|string|max:500',
            'cheikh_ref'        => 'nullable|string|max:255',
            'profession'        => 'nullable|string|max:255',
            'dahira_name'       => 'nullable|string|max:255',
            'whatsapp'          => 'nullable|string|max:20',
            'website'           => 'nullable|url|max:255',
            'country'           => 'nullable|string|max:10',
            'city'              => 'nullable|string|max:100',
            'latitude'          => 'nullable|numeric|between:-90,90',
            'longitude'         => 'nullable|numeric|between:-180,180',
            'is_visible_map'    => 'nullable|boolean',
            'is_available_help' => 'nullable|boolean',
            'cover_image'       => 'nullable|image|mimes:jpg,png,webp|max:2048',
        ];
    }
}
