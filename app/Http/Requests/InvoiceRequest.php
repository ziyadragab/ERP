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
        'number' => 'required|string',
        'date' => 'required|date',
        'due_date' => 'required|date',
        'subtotal' => 'required|numeric',
        'shipping' => 'numeric',
        'discount' => 'required|numeric',
        'total' => 'required|numeric',
        'notes' => 'nullable|string',
        'type' => 'required|string',
        'customer_id' => 'nullable|exists:customers,id',
        'customer_name' => 'required_without:existingCustomer|string',
        'customer_address_1' => 'required_without:existingCustomer|string',
        'customer_town' => 'required_without:existingCustomer|string',
        'customer_postcode' => 'required_without:existingCustomer|string',
        'customer_email' => 'required_without:existingCustomer|email',
        'customer_address_2' => 'nullable|string',
        'customer_county' => 'required_without:existingCustomer|string',
        'customer_phone' => 'required_without:existingCustomer|string',
        'customer_name_ship' => 'required|string',
        'customer_address_2_ship' => 'nullable|string',
        'customer_county_ship' => 'required|string',
        'customer_address_1_ship' => 'required|string',
        'customer_town_ship' => 'required|string',
        'customer_postcode_ship' => 'required|string',
        'invoice_products' => 'required|min:1', // Ensure there is at least one product
        'invoice_products.*.name' => 'required|string|exists:products,name',
        'invoice_products.*.item_code' => 'required|string|exists:products,item_code',
        'invoice_products.*.quantity' => 'required|integer|min:1|max_available_quantity',
        'invoice_products.*.price' => 'required|numeric|min:0',
        'invoice_products.*.discount' => 'required|numeric|min:0',
        'invoice_products.*.subtotal' => 'required|numeric|min:0',
    ];
}

}
