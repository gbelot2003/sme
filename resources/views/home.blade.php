@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Subir Archivo excel</div>
                <div class="panel-body">
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="file">Selecciona un archivo de excel</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-upload" aria-hidden="true"></i>
                                Subir
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
