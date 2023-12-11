<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\DataTables\InvoiceDataTable;
use App\Http\Requests\InvoiceRequest;
use App\Http\Interfaces\InvoiceInterface;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    private $invoiceInterface;
    public function __construct(InvoiceInterface $invoiceInterface)
    {
      $this->invoiceInterface=$invoiceInterface;
    }
    public function index(InvoiceDataTable $dataTable){
        return $this->invoiceInterface->index($dataTable);
    }
    public function create(){
        return $this->invoiceInterface->create();
    }
    public function store(InvoiceRequest $request){
        return $this->invoiceInterface->store($request);
    }
    public function edit(Invoice $invoice){
        return $this->invoiceInterface->edit($invoice);
    }
    public function update( Invoice $invoice, InvoiceRequest $request){
        return $this->invoiceInterface->update($invoice,$request);
    }
    public function delete(Invoice $invoice){
        return $this->invoiceInterface->delete($invoice);
    }
    public function getCustomerDetails(Customer $customer)
    {
        return $this->invoiceInterface->getCustomerDetails($customer);
    }
}
