@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
 
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $rol->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            @foreach ($permissions as $permission)
                <div>
                    <label>
                        {!! Form::checkbox('permissions[]',$permission->id,null,['class' => 'mr-1']) !!}
                        {{$permission->description}}
                    </label>
                </div>
            @endforeach
        </div>
    <div class="box-footer mt20">
        <a class="btn btn-danger" href="{{ route('roles.index') }}"> Atrás</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif