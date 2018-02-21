<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Excel;
ini_set('max_execution_time', 450);

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return View('home');
    }

    public function uploadHandler(Request $request)
    {
        $i = 0;
        $o = 0;
        $u = 0;

        $file = Input::file('file');
        $file_name = $file->getClientOriginalName();
        $file->move('files', $file_name);

        $results = Excel::load('files/' . $file_name, function ($reader) {

            $reader->all();

        })->get();

        $datas = $results;
        if ($results->count()) {
            $allintests = [];
            foreach ($results as $value){
                $results = new Register();
                $results->cuenta = $value->cuenta;
                $results->destinatario = $value->destinatario;
                $results->direccion = $value->direccion;
                $results->municipio = $value->municipio;
                $results->departamento = $value->departamento;
                $results->ruta = $value->ruta;
                $results->status = $value->estatus;
                $results->recibe = $value->recibe;
                $results->observaciones = $value->observacion_telefono;
                $results->banco = $value->banco;
                $results->fecha = $value->fecha;
                $results->corte = $value->corte;
                 $allintests[] = $results->attributesToArray();
            }
            foreach (array_chunk($allintests, 300) as $edata){
                foreach ($edata as $c){
                    Register::insert($c);
                }
            }
        }
        flash("Nuevas Filas Creadas, " . $datas->count());
        return redirect()->to('/home');

    }
}
