<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBatchRequest extends FormRequest
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
            'product_id'      => 'required|exists:products,id',
            'batch_number'    => 'nullable|string|max:50',
            'expiration_date' => 'nullable|date',
            'quantity'        => 'required|integer|min:1',
        ];
    }
}
