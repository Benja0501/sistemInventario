<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
        $supplierId = $this->route('supplier')->id;

        return [
            'business_name' => 'required|string|max:100',
            'tax_id'        => 'required|string|unique:suppliers,tax_id,' . $supplierId,
            'address'       => 'nullable|string|max:150',
            'phone'         => 'nullable|string|max:30',
            'email'         => 'nullable|email|max:100',
            'status'        => 'required|in:active,inactive',
        ];
    }
}
