<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Models\Product;


class ProductRepository implements ProductInterface{
    public function index($dataTable)
    {
       return $dataTable->render('product.index');
    }
    public function create()
    {
        return view('product.create');
    }
    public function store($request)
    {
        Product::create([
            'item'=>$request->item,
            'item_code'=>$request->item_code,
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
      return view('product.edit',compact('product'));
    }
    public function update($product, $request)
    {
        $product->update([
            'item'=>$request->item,
            'item_code'=>$request->item_code,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'type'=>$request->type,
            'discount'=>$request->discount,
            'tax'=>$request->tax,
            'quantity'=>$request->quantity
        ]);
        toast('Your Product Updated Successfully!','success');
        return redirect()->route('product.index');
    }
    public function delete($product)
    {
        $product->delete();
        toast('Product Deleted Successfully' , 'success');
        return back();
    }
    public function search($request)
    {
        // Retrieve the search text from the request
        $searchText = $request->input('searchText');

        // Perform a search in the database based on the entered text
        $products = Product::where('item_code', 'like', "%$searchText%")
                            ->get(['item']); // Retrieve only the 'name' column

        // Return the result as JSON
        return response()->json($products);
    }
}


?>
