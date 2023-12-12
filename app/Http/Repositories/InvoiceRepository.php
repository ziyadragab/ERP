<?php

namespace App\Http\Repositories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\InvoiceProducts;
use App\Http\Interfaces\InvoiceInterface;

class InvoiceRepository implements InvoiceInterface
{
    public function index($dataTable)
    {
        return $dataTable->render('invoice.index');
    }
    public function create()
    {
        $customers = Customer::get();
        $products = Product::get();
        return view('invoice.create', compact(['products', 'customers']));
    }
    public function store($request)
    {

        if ($request->customer_id) {
            $customer_id = $request->customer_id;
        } else {
            $customer = Customer::create([
                'name' => $request->customer_name,
                'email' => $request->customer_email,
                'address_1' => $request->customer_address_1,
                'address_2' => $request->customer_address_2,
                'town' => $request->customer_town,
                'country' => $request->customer_county,
                'post_code' => $request->customer_postcode,
                'phone' => $request->customer_phone,
                'name_ship' => $request->customer_name_ship,
                'address_1_ship' => $request->customer_address_1_ship,
                'address_2_ship' => $request->customer_address_2_ship,
                'town_ship' => $request->customer_town_ship,
                'county_ship' => $request->customer_county_ship,
                'post_code_ship' => $request->customer_postcode_ship,
            ]);
            $customer_id = $customer->id;
        }
        $invoice = Invoice::create([
            'number' => $request->number,
            'date' => $request->date,
            'due_date' => $request->due_date,
            'subtotal' => $request->subtotal,
            'discount' =>  $request->discount,
            'total' =>  $request->total,
            'notes' =>  $request->notes,
            'type' =>  $request->type,
            'customer_id' => $customer_id,
        ]);

        $jsonString = $request->input('invoice_products');

        $products = json_decode($jsonString, true);

        foreach ($products as $product) {
            InvoiceProducts::create([
                'product_name' => $product['name'],
                'product_code' => $product['item_code'],
                'product_quantity' => $product['quantity'],
                'product_price' => $product['price'],
                'product_discount' => $product['discount'],
                'product_subTotal' => $product['subtotal'],
                'invoice_id'=>$invoice->id
            ]);
        }
        toast( 'Invoice Created Successfully' ,'success');
        return response()->json(['message' => 'Invoice created successfully']);
    }
    public function edit($invoice)
    {
        return view('invoice.edit', compact('invoice'));
    }
    public function update($invoice, $request)
    {
        $invoice->update([
            'item' => $request->item,
            'item_code' => $request->item_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'type' => $request->type,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'quantity' => $request->quantity
        ]);
        toast('Your invoice Updated Successfully!', 'success');
        return redirect()->route('invoice.index');
    }
    public function delete($invoice)
    {
        $invoice->delete();
        toast('invoice Deleted Successfully', 'success');
        return back();
    }
    public function getCustomerDetails($customer)
    {

        return response()->json($customer);
    }
}
