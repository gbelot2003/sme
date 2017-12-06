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
        $i = 0;
        $o = 0;
        $u = 0;

        $file = Input::file('file');
        $file_name = $file->getClientOriginalName();
        $file->move('files', $file_name);

        $results = Excel::load('files/' . $file_name, function ($reader) {

            $reader->all();

        })->get();


        if($results->count()){
            //dd($results->toArray());
            foreach ($results as $key => $value) {
                $u++;
                Register::create([
                    'cuenta' => $value->cuenta,
                    'destinatario' => $value->destinatario,
                    'direccion' => $value->direccion,
                    'municipio' => $value->municipio,
                    'departamento' => $value->departamento,
                    'ruta' => $value->ruta,
                    'status' => $value->estatus,
                    'recibe' => $value->recibe,
                    'observaciones' => $value->observacion_telefono,
                    'banco' => $value->banco,
                    'fecha' => $value->fecha,
                    'corte' => $value->corte,
                ]);
            }

        }

        flash("<strong>". $i. "</strong> Filas procesadas, <strong>" . $o . "</strong> actualizadas y <strong>" . $u . "</strong> creadas");
        return redirect()->to('/home');

    }
}
