<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SafeInterface;
use Illuminate\Http\Request;

class SafeController extends Controller
{
    private $safeInterface;
    public function __construct(SafeInterface $safeInterface)
    {
         $this->safeInterface=$safeInterface;
    }
    public function index(){
        return $this->safeInterface->index();
    }
}
