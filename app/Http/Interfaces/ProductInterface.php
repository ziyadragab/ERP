<?php

namespace App\Http\Interfaces;

interface ProductInterface{
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($product);
    public function update($product,$request);
    public function delete($product);
    public function search($request);




}






?>
