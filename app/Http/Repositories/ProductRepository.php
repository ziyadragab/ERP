<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Models\Product;


class ProductRepository implements ProductInterface{
    public function index()
    {
        $products=Product::get();
        return view('product.index',compact('products'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store($request)
    {
        Product::create([
            'item'=>$request->item,
            'item_code'=>$request->itemCode,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'type'=>$request->type,
            'discount'=>$request->discount,
            'tax'=>$request->tax,
            'quantity'=>$request->quantity
        ]);
        toast('Your Product as been submited!','success');
        return redirect()->route('product.index');

    }
    public function edit($product)
    {
      return view('prodcut.edit',compact('prduct'));
    }
    public function delete($product)
    {
        $product->delete();
        toast('Product Deleted Successfully' , 'success');
        return back();
    }
}


?>
