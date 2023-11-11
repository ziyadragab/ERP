<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\StoreInterface;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $storeInterface;
    public function __construct(StoreInterface $storeInterface)
    {
         $this->storeInterface=$storeInterface;
    }
    public function index(){
        return $this->storeInterface->index();
    }
    public function create(){
        return $this->storeInterface->create();
    }
    public function store(StoreRequest $request)
    {
        return $this->storeInterface->store($request);
    }
    public function edit(Store $store)
    {
        return $this->storeInterface->edit($store);
    }
}
