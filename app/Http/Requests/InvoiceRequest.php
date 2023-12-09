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
        'customer_id' => 'required|exists:customers,id',
    ];
}

}
