@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Es Activo') }}
            {{ Form::select('es_activo', array(
                '0' => 'Desactivar',
                '1' => 'Activar',
            ),null ,['class' => 'form-select']) }}
            {!! $errors->first('es_activo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
            @foreach ($roles as $rol)
            {{ Form::label('Roles') }}
                <div>
                    <label>
                        {!! Form::checkbox('roles[]',$rol->id,null,['class' => 'mr-1']) !!}
                        {{$rol->name}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="box-footer mt20">
        <a class="btn btn-danger" href="{{ route('usuarios.index') }}"> Atrás</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif