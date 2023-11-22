<?php
namespace App\Http\Interfaces;

interface CustomerInterface {

    public function index();
    public function create();
    public function store($request);
    public function edit($customer);
    public function update($customer,$request);
    public function delete($customer);

}



?>
