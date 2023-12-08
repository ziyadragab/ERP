<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'invoice' => 'required|string',
            'invoice_date' => 'required|date',
            'invoice_due_date' => 'required|date',
            'subtotal' => 'required|numeric',
            'shipping' => 'required|numeric',
            'discount' => 'required|numeric',
            'vat' => 'required|numeric',
            'total' => 'required|numeric',
            'notes' => 'nullable|string',
            'invoice_type' => 'required|string',
            'status' => 'required|string',
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required',
            'products.*.id' => 'required|exists:products,id', 
            'products.*.quantity' => 'required|integer|min:1',
        ];
    }
}
