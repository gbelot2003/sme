@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Reportes</h3>
                <form action="/reportes" method="post">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-3 form-group  ">
                            <label for="inicio">Fecha de Inicio</label>
                            <input class="form-control dateclass" id="inicio" required="" name="inicio" type="date"
                                   value="<?php echo date('Y-m-d') ?>">
                        </div>

                        <div class="col-md-3 form-group  ">
                            <label for="inicio">Fecha de Final</label>
                            <input class="form-control dateclass" id="final" required="" name="final" type="date"
                                   value="<?php echo date('Y-m-d') ?>">
                        </div>

                        <div class="col-md-3 form-group  ">
                            <label for="inicio">Código de Banco</label>
                            <input class="form-control dateclass" id="final" required="" name="banco" type="text"
                                   value="">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn-primary btn">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop