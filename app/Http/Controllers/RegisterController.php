<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function __construct()
    {
    }

    public function search($banco, $cuenta)
    {

        $data = Register::where('banco', $banco)->where('cuenta', $cuenta)->get();
        if (count($data)) {
            return $data;
        }
        return "Sin_datos";
    }
}
