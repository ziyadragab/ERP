<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SafeInterface;

class SafeRepository implements SafeInterface{
    public function index()
    {
        return view('safes.index');
    }
}


?>
