<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $productId = $this->route('product')->id;

        return [
            'sku'             => 'required|string|unique:products,sku,' . $productId,
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
