@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Creación de Usuarios</h2>
                {!! Form::open(['action' => ['UserController@store'], 'method' => 'post']) !!}
                @include('users._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop