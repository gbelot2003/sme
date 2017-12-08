<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Excel;

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

        $file = Input::file('file');
        $file_name = $file->getClientOriginalName();
        $file->move('files', $file_name);

        $results = Excel::load('files/' . $file_name, function ($reader) {

            $reader->all();

        })->get();


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

            Register::insert($allintests);

        }


        flash("Nuevas Filas Creadas, " . $results->count());
        return redirect()->to('/home');

    }
}
