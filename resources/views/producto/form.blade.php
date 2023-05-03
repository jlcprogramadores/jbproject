@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 form-group">
                    {{ Form::label('código') }}
                    {{ Form::text('codigo', $producto->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
                    {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm-10 form-group">
                    {{ Form::label('descripción') }}
                    {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm form-group">
                    {{ Form::label('marca') }}
                    {{ Form::text('marca', $producto->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
                    {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm form-group">
                    {{ Form::label('modelo') }}
                    {{ Form::text('modelo', $producto->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                    {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                
                
                <div class="col-sm form-group">
                    {{ Form::label('precio_unitario') }}
                    {{ Form::number('precio_unitario', $producto->precio_unitario, ['class' => 'form-control' . ($errors->has('precio_unitario') ? ' is-invalid' : ''),'min'=>'0', 'step'=>'any','placeholder' => 'Precio Unitario']) }}
                    {!! $errors->first('precio_unitario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm form-group">
                    {{ Form::label('mínimo') }}
                    {{ Form::number('minimo', $producto->minimo, ['class' => 'form-control' . ($errors->has('minimo') ? ' is-invalid' : ''),'min'=>'0', 'placeholder' => 'Minimo']) }}
                    {!! $errors->first('minimo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm form-group">
                    {{ Form::label('máximo') }}
                    {{ Form::number('maximo', $producto->maximo, ['class' => 'form-control' . ($errors->has('maximo') ? ' is-invalid' : ''),'min'=>'0', 'placeholder' => 'Maximo']) }}
                    {!! $errors->first('maximo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('productos.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif