<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'town' => 'nullable|string',
            'country' => 'nullable|string',
            'post_code' => 'nullable|integer',
            'phone' => 'nullable|string',
            'name_ship' => 'nullable|string',
            'address_1_ship' => 'nullable|string',
            'address_2_ship' => 'nullable|string',
            'town_ship' => 'nullable|string',
            'county_ship' => 'nullable|string',
            'post_code_ship' => 'nullable|integer',
            'phone_ship' => 'nullable|string',
        ];
    }
}
