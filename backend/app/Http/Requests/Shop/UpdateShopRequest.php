<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'country'     => ['nullable', 'string', 'size:2'],
            'city'        => ['nullable', 'string', 'max:100'],
            'address'     => ['nullable', 'string'],
            'phone'       => ['nullable', 'string', 'max:30'],
            'whatsapp'    => ['nullable', 'string', 'max:30'],
            'email'       => ['nullable', 'email'],
            'website'     => ['nullable', 'url'],
            'logo'        => ['nullable', 'image', 'max:2048'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
        ];
    }
}
