<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use Acme\Helpers\FormatQueryDates;

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
        $inicio = $request->input('inicio');
        $final = $request->input('final');
        $banco = $request->input('banco');

        $dates = new FormatQueryDates($inicio, $final);
        list($bdate, $edate) = $dates->formatQueryDates();


        $registro = Register::SelectRaw('status, COUNT(id) as total')
            ->whereBetween('updated_at', [$bdate, $edate])
            ->where('banco', $banco)
            ->groupBy('status');

        return  $registro->get();

    }
}
