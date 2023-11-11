<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\StoreInterface;
use App\Models\Store;

class StoreRepository implements StoreInterface{
    public function index()
    {
        $stores=Store::get();
        return view('safes.index',compact('stores'));
    }
    public function create()
    {
        return view('safes.create');
    }
    public function store($request)
    {
        Store::create([
            'item'=>$request->item,
            'item-code'=>$request->itemCode,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'type'=>$request->type,
            'discount'=>$request->discount,
            'tax'=>$request->tax,
            'quantity'=>$request->quantity
        ]);
        toast('Your Store as been submited!','success');
        return redirect()->route('store.index');
        
    }
    public function edit($store)
    {
      return view('safes.edit',compact('store'));   
    }
}


?>
