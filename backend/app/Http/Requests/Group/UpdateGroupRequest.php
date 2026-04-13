<?php

namespace App\Http\Requests\Group;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $group = $this->route('group');
        return $group->isAdmin(auth()->user());
    }

    public function rules(): array
    {
        return [
            'name'        => 'nullable|string|max:255',
            'description' => 'nullable|string|min:20|max:1000',
            'is_private'  => 'nullable|boolean',
            'cover'       => 'nullable|image|mimes:jpg,png,webp|max:2048',
        ];
    }
}
