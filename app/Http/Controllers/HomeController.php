<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\HomeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeInterface;
    public function __construct(HomeInterface $home)
    {
        $this->homeInterface = $home;
    }
    public function index()
    {
        return $this->homeInterface->index();
    }
}
