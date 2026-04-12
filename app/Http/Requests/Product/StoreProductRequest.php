<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shop_id'        => ['required', 'exists:shops,id'],
            'category_id'    => ['required', 'exists:categories,id'],
            'name'           => ['required', 'string', 'max:255'],
            'description'    => ['required', 'string'],
            'specifications' => ['nullable', 'string'],
            'price'          => ['required', 'numeric', 'min:0'],
            'price_promo'    => ['nullable', 'numeric', 'min:0', 'lt:price'],
            'unit'           => ['nullable', 'string', 'max:50'],
            'stock'          => ['nullable', 'integer', 'min:0'],
            'min_order'      => ['nullable', 'integer', 'min:1'],
            'delivery_zones' => ['nullable', 'string'],
            'delivery_delay' => ['nullable', 'string', 'max:100'],
            'delivery_free'  => ['boolean'],
            'images'         => ['nullable', 'array', 'max:8'],
            'images.*'       => ['image', 'max:4096'],
        ];
    }
}
