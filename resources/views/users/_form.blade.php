<div class="row">
    <div class="col-md-6  form-group box-style">
        <label for="nombre">Nombre de Usuario</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-6 form-group box-style">
        <label for="email">Correo Electrónico</label>
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group box-style">
        <label for="nombre">Contraseña</label>
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-6 form-group box-style">
        <label for="nombre">Repita Contraseña</label>
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-6 box-style form-group">
        <label for="state">Estado</label>
        {!! Form::select('status_id', $state, null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-6 box-style form-group">
        <label for="state">Role</label>
        {!! Form::select('role', $roles, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12 form-group">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</div>