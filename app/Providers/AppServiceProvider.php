<?php

namespace App\Http\Controllers;

use App\Services\MyService;

class MyController extends Controller
{
    protected $myService;

    public function __construct(MyService $myService)
    {
        $this->myService = $myService;
    }

    // Otros métodos de la clase
}
