@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Role</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->states->name }}</td>
                                <td><a class="btn btn-primary" href="/users/{{ $item->id }}/edit">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
        </div>
    </div>
@endsection
