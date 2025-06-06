<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscrepancyRequest extends FormRequest
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
            'product_id'        => 'required|exists:products,id',
            'system_quantity'   => 'required|integer|min:0',
            'physical_quantity' => 'required|integer|min:0',
            'discrepancy_type'  => 'required|in:missing,surplus,damaged,wrong_location,other',
            'note'              => 'nullable|string|max:500',
            'evidence_path'     => 'nullable|string|max:255',
        ];
    }
}
