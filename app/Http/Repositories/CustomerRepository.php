<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\CustomerInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerInterface{
    public function index()
    {
      $customers=Customer::get();
      return view('customer.index',compact('customers'));
    }
    public function create()
    {
         return view('customer.create');
        
    }
    public function store($request)
    {
        Customer::create([
            'name'=>$request->name,
            'email'=>$request->email??null,

            'address_1'=>$request->address_1,
            'address_2'=>$request->address_2??null,
            'town'=>$request->town??null,
            'country'=>$request->country??null,
            'post_code'=>$request->post_code??null,
            'phone'=>$request->phone??null
        ]);
        toast('Customer Created Successfully','success');
        return redirect(route('customer.index'));
    }
    public function edit($customer)
    {

    }
    public function update($customer, $request)
    {

    }
    public function delete($customer)
    {

    }
}






?>
