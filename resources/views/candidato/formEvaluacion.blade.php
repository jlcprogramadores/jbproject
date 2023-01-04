<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $candidato->nombre }}
        </div>
        <div class="form-group">
            <strong>Género:</strong>
            @if($candidato->genero  == 0 )
                <span>Masculino</span>
            @elseif ($candidato->genero  == 1 )
                <span>Femenino</span>
            @else
                <span>Otro</span>
            @endif
        </div>
        <div class="form-group">
            <strong>Teléfono Personal:</strong>
            {{ $candidato->telefono_personal }}
        </div>
        <div class="form-group">
            <strong>Correo:</strong>
            {{ $candidato->correo }}
        </div>
        <div class="form-group">
            <strong>Currículum:</strong>
            @if ($candidato->curriculum)
                <td><a href="{{$candidato->curriculum}}">Link Currículum</a></td> 
            @else
                <td><span class="text-danger">Sin Currículum</span></td>
            @endif 
        </div>
        
        <div class="form-group d-none">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $candidato->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('genero') }}
            {{ Form::select('genero',array('0' => 'Masculino', '1' => 'Femenino', '2'=> 'Otro'), $candidato->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : '')]) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('telefono_personal') }}
            {{ Form::number('telefono_personal', $candidato->telefono_personal, ['class' => 'form-control' . ($errors->has('telefono_personal') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Personal']) }}
            {!! $errors->first('telefono_personal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('correo') }}
            {{ Form::email('correo', $candidato->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if ( Auth::user()->hasRole('Validador_1'))
        <div class="col-sm p-1 form-group">
            {{ Form::label('validacion_1') }}
            {{ Form::select('validacion_1',array('0' => 'Rechazado', '1' => 'Aceptado'), $candidato->validacion_1, ['class' => 'form-control' . ($errors->has('validacion_1') ? ' is-invalid' : '')]) }}
            {!! $errors->first('validacion_1', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        @endif
        @if ( Auth::user()->hasRole('Validador_2'))
        <div class="col-sm p-1 form-group">
            {{ Form::label('validacion_2') }}
            {{ Form::select('validacion_2',array('0' => 'Rechazado', '1' => 'Aceptado'), $candidato->validacion_2, ['class' => 'form-control' . ($errors->has('validacion_2') ? ' is-invalid' : '')]) }}
            {!! $errors->first('validacion_2', '<div class="invalid-feedback">:message</div>') !!}
        </div>  
        @endif
        
        @if ( Auth::user()->hasRole('Validador_3'))
        <div class="col-sm p-1 form-group">
            {{ Form::label('validacion_3') }}
            {{ Form::select('validacion_3',array('0' => 'Rechazado', '1' => 'Aceptado'), $candidato->validacion_3, ['class' => 'form-control' . ($errors->has('validacion_3') ? ' is-invalid' : '')]) }}
            {!! $errors->first('validacion_3', '<div class="invalid-feedback">:message</div>') !!}
        </div>   
        @endif
    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('candidatos.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>