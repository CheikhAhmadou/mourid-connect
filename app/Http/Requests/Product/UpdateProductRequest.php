<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id'    => ['sometimes', 'exists:categories,id'],
            'name'           => ['sometimes', 'string', 'max:255'],
            'description'    => ['sometimes', 'string'],
            'specifications' => ['nullable', 'string'],
            'price'          => ['sometimes', 'numeric', 'min:0'],
            'price_promo'    => ['nullable', 'numeric', 'min:0'],
            'unit'           => ['nullable', 'string', 'max:50'],
            'stock'          => ['nullable', 'integer', 'min:0'],
            'min_order'      => ['nullable', 'integer', 'min:1'],
            'delivery_zones' => ['nullable', 'string'],
            'delivery_delay' => ['nullable', 'string', 'max:100'],
            'delivery_free'  => ['boolean'],
            'is_available'   => ['boolean'],
            'images'         => ['nullable', 'array', 'max:8'],
            'images.*'       => ['image', 'max:4096'],
        ];
    }
}
