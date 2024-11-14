<?php

use App\Http\Middleware\MiMiddleware;

class MiControlador extends Controller
{
    public function __construct()
    {
        $this->middleware(MiMiddleware::class);
    }

    // Métodos del controlador
}
