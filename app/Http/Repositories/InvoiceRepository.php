<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\InvoiceInterface;
use App\Models\Customer;
use App\Models\invoice;
use App\Models\Product;

class InvoiceRepository implements InvoiceInterface{
    public function index($dataTable)
    {
       return $dataTable->render('invoice.index');
    }
    public function create()
    {
        $customers=Customer::get();
        $products=Product::get();
        return view('invoice.create' , compact(['products','customers']));
    }
    public function store($request)
    {
        invoice::create([
            'item'=>$request->item,
            'item_code'=>$request->item_code,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'type'=>$request->type,
            'discount'=>$request->discount,
            'tax'=>$request->tax,
            'quantity'=>$request->quantity
        ]);
        toast('Your invoice as been submited!','success');
        return redirect()->route('invoice.index');

    }
    public function edit($invoice)
    {
      return view('invoice.edit',compact('invoice'));
    }
    public function update($invoice, $request)
    {
        $invoice->update([
            'item'=>$request->item,
            'item_code'=>$request->item_code,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'type'=>$request->type,
            'discount'=>$request->discount,
            'tax'=>$request->tax,
            'quantity'=>$request->quantity
        ]);
        toast('Your invoice Updated Successfully!','success');
        return redirect()->route('invoice.index');
    }
    public function delete($invoice)
    {
        $invoice->delete();
        toast('invoice Deleted Successfully' , 'success');
        return back();
    }
    public function getCustomerDetails($customer){

        return response()->json($customer);
    }
}


?>
