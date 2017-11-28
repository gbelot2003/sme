<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function __construct()
    {
    }

    public function search()
    {
        $data = Register::findOrFail(1);
        return $data;
    }
}
