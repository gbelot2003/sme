@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Reportes</h3>
                <div class="row">

                    <div class="col-md-3 form-group  ">
                        <label for="inicio">Fecha de Inicio</label>
                        <input class="form-control dateclass" id="inicio" required="" name="inicio" type="text" value="28/11/2017">
                    </div>

                    <div class="col-md-3 form-group  ">
                        <label for="inicio">Fecha de Final</label>
                        <input class="form-control dateclass" id="final" required="" name="final" type="text" value="28/11/2017">
                    </div>

                    <div class="col-md-3 form-group  ">
                        <label for="inicio">Código de Banco</label>
                        <input class="form-control dateclass" id="final" required="" name="final" type="text" value="">
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop