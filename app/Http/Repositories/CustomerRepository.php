<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CustomerInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerInterface
{
    public function index($dataTable)
    {
        return $dataTable->render('customer.index');
    }
    public function create()
    {
        return view('customer.create');
    }
    public function store($request)
    {
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'town' => $request->town,
            'country' => $request->country,
            'post_code' => $request->post_code,
            'phone' => $request->phone,
            'name_ship' => $request->name_ship,
            'address_1_ship' => $request->address_1_ship,
            'address_2_ship' => $request->address_2_ship,
            'town_ship' => $request->town_ship,
            'county_ship' => $request->county_ship,
            'post_code_ship' => $request->post_code_ship,
            'phone_ship' => $request->phone_ship,
        ]);
        toast('Customer Created Successfully', 'success');
        return redirect(route('customer.index'));
    }
    public function edit($customer)
    {
        return view('customer.edit', compact('customer'));
    }
    public function update($customer, $request)
    {
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'town' => $request->town,
            'country' => $request->country,
            'post_code' => $request->post_code,
            'phone' => $request->phone,
            'name_ship' => $request->name_ship,
            'address_1_ship' => $request->address_1_ship,
            'address_2_ship' => $request->address_2_ship,
            'town_ship' => $request->town_ship,
            'county_ship' => $request->county_ship,
            'post_code_ship' => $request->post_code_ship,
            'phone_ship' => $request->phone_ship,

        ]);
        toast('Customer Updated Successfully', 'success');
        return redirect(route('customer.index'));
    }
    public function delete($customer)
    {
        $customer->delete();
        toast('Customer Deleted Successfully', 'success');
        return redirect(route('customer.index'));
    }
   
}
