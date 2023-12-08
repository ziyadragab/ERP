<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\DataTables\InvoiceDataTable;
use App\Http\Requests\InvoiceRequest;
use App\Http\Interfaces\InvoiceInterface;

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
    public function getCustomerDetails(Customer $customer)
    {
        return $this->invoiceInterface->getCustomerDetails($customer);
    }
}
