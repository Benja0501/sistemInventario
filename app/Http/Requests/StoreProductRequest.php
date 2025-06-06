<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'sku'             => 'required|string|unique:products,sku',
            'name'            => 'required|string|max:100',
            'description'     => 'nullable|string',
            'unit_price'      => 'required|numeric|min:0',
            'min_stock'       => 'required|integer|min:0',
            'current_stock'   => 'required|integer|min:0',
            'unit_of_measure' => 'required|string|max:20',
            'category_id'     => 'nullable|exists:categories,id',
            'status'          => 'required|in:active,inactive',
        ];
    }
}
