<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CustomerInterface;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerIntreface;
    public function __construct(CustomerInterface $customer)
    {
      $this->customerIntreface=$customer;
    }

    public function index()
    {
         return $this->customerIntreface->index();
    }
    public function create()
    {
        return $this->customerIntreface->create();
    }
    public function store(CustomerRequest $request)
    {
        return $this->customerIntreface->store($request);
    }
    public function edit(Customer $customer)
    {
        return $this->customerIntreface->edit($customer);
    }
    public function update(Customer $customer,CustomerRequest $request)
    {
        return $this->customerIntreface->update($customer,$request);
    }
    public function delete(Customer $customer)
    {
        return $this->customerIntreface->delete($customer);
    }
}
