
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-sm p-2 form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-2 form-group">
                    {{ Form::label('email') }}
                    {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm p-2 form-group">
                    {{ Form::label('Estado De Cuenta') }}
                    {{ Form::select('es_activo', array(
                        '0' => 'Desactivada',
                        '1' => 'Activada',
                    ),null ,['class' => 'form-select']) }}
                    {!! $errors->first('es_activo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <br>
            <div class="row">
                <li class="list-group-item list-group-item-primary">
                    {{ Form::label('Selecciona el Rol') }}
                </li>
                <ul class="list-group">
                    @foreach ($roles as $rol)
                        <li class="list-group-item">
                            {!! Form::checkbox('roles[]',$rol->id,null,['class' => 'mr-1']) !!}
                            {{$rol->name}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('usuarios.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
    
</div>