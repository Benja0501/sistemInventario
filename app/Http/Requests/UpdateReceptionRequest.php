<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReceptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'received_at'              => 'required|date',
            'items'                    => 'required|array|min:1',
            'items.*.product_id'       => 'required|exists:products,id',
            'items.*.quantity_received'=> 'required|integer|min:0',
            'items.*.quantity_missing' => 'nullable|integer|min:0',
            'items.*.quantity_damaged' => 'nullable|integer|min:0',
            'items.*.batch_number'     => 'nullable|string|max:50',
            'items.*.expiration_date'  => 'nullable|date',
        ];
    }
}
