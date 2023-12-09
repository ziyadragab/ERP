<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Interfaces\ProductInterface;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productInterface;
    public function __construct(ProductInterface $productInterface)
    {
         $this->productInterface=$productInterface;
    }
    public function index(ProductDataTable $dataTable){
        return $this->productInterface->index($dataTable);
    }
    public function create(){
        return $this->productInterface->create();
    }
    public function store(ProductRequest $request)
    {
        return $this->productInterface->store($request);
    }
    public function edit(Product $product)
    {
        return $this->productInterface->edit($product);
    }
    public function update(Product $product , ProductRequest $request)
    {
        return $this->productInterface->update($product, $request);
    }

    public function delete(Product $product)
    {
        return $this->productInterface->delete($product);
    }
    public function search(Request $request)
    {
        return $this->productInterface->search($request);
    }
}
