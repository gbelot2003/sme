<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return View('reportes.index');
    }
}
