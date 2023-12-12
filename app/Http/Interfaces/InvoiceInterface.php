<?php

namespace App\Http\Interfaces;

interface InvoiceInterface{
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($invoice);
    public function update($invoice,$request);
    public function delete($invoice);
    public function getCustomerDetails($customer);
    public function deleteProduct($itemCode);
  


}






?>
