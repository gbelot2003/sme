@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edición de Usuarios</h2>
                {!! Form::model($item, ['action' => ['UserController@update', $item->id], 'method' => 'put']) !!}
                    @include('users._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop