<?php

namespace App\Http\Repositories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\InvoiceProducts;
use App\Http\Interfaces\InvoiceInterface;
use GuzzleHttp\Psr7\Request;

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
            if (!empty($product['name'])) {
                InvoiceProducts::create([
                    'product_name' => $product['name'],
                    'product_code' => $product['item_code'],
                    'product_quantity' => $product['quantity'],
                    'product_price' => $product['price'],
                    'product_discount' => $product['discount'],
                    'product_subTotal' => $product['subtotal'],
                    'invoice_id' => $invoice->id
                ]);
            }
        }
        
        toast('Invoice Created Successfully', 'success');
        return response()->json(['message' => 'Invoice created successfully']);
    }
    public function edit($invoice)
    {
        $customers = Customer::get();
        return view('invoice.edit', compact(['invoice', 'customers']));
    }
    public function update($invoice, $request)
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


        $invoice->update([
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
        $invoice_products = InvoiceProducts::where('invoice_id', $invoice->id)->get();
        // Identify and update existing products or create new ones
        foreach ($products as $product) {
            // Check if the product name is not empty
            if (!empty($product['name'])) {
                $invoiceProduct = $invoice_products->where('product_code', $product['item_code'])->first();
                if ($invoiceProduct) {
                    // Update existing product
                    $invoiceProduct->update([
                        'product_name' => $product['name'],
                        'product_quantity' => $product['quantity'],
                        'product_price' => $product['price'],
                        'product_discount' => $product['discount'],
                        'product_subTotal' => $product['subtotal'],
                    ]);
                } else {
                    // Create new product
                    InvoiceProducts::create([
                        'product_name' => $product['name'],
                        'product_code' => $product['item_code'],
                        'product_quantity' => $product['quantity'],
                        'product_price' => $product['price'],
                        'product_discount' => $product['discount'],
                        'product_subTotal' => $product['subtotal'],
                        'invoice_id' => $invoice->id
                    ]);
                }
            }
        }


        toast('Your invoice Updated Successfully!', 'success');
        return response()->json(['message' => 'Invoice updated successfully']);
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
    public function deleteProduct($itemCode)
    {
        // Find the product by product_code
        $product = InvoiceProducts::where('product_code', $itemCode)->first();

        if ($product) {
            // Delete the product
            $product->delete();
    
            return response()->json(['message' => 'Product deleted successfully'], 204);
        }
    
        return response()->json(['error' => 'Product not found'], 404);
    }  
    
         
}
