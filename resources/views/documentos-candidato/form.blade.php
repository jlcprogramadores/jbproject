
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <?php  
                    // detemino si se esta creandp o editando
                    $esEditado = $documentosCandidato->archivo ? true : false;
                    $candidato = '';
                    if(!$esEditado){
                        $candidato = [request()->id => request()->nombre];
                    }
                ?>
                <div class="form-group">
                    {{ Form::label('candidato') }}
                    {{ Form::select('candidato_id',$esEditado? $documentosCandidato->candidato_id : $candidato ,null, ['class' => 'form-control' . ($errors->has('candidato_id') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('candidato_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {{ Form::label('archivo') }}
                    <input type="file" name="archivo[]" class="form-control" multiple="multiple">
                    {!! $errors->first('archivo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="form-group d-none">
                {{ Form::label('usuario_edito') }}
                {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('candidatos.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif
