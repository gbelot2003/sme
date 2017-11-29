<?php

namespace App\Http\Controllers;

use App\Register;
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

    public function reporte(Request $request)
    {
        $register = Register::SelectRaw('status, COUNT(id) as total')
            ->where('banco', 83985)
            ->groupBy('status')
            ->get();
        return $register;
    }
}
