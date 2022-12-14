<div class="box box-success padding-1">
    <div class="box-body">
        
        
        <div class="container text-uppercase">
            <div class="row">
                <div class="form-group col-md p-1">
                    {{ Form::label('empleado_id', 'Empleado') }}
                    <br>
                    {{ Form::select('empleado_id', $empleado, null, ['class' => 'form-control form-control-sm ' . ($errors->has('empleado_id') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

                <?php 
                    $i = -1 ;
                    $inicial = false;
                ?>
                @foreach ($expediente as $item)
                    <?php $i++; ?>
        
                    @if ($i % 3 == 0)
                        @if ($inicial)
                            </div>
                            <div class="row">
                            @if ($item->es_multiple)
                                <div class="form-group col-md p-1">
                                    {{ Form::label($item->id,strtr($item->nombre,'_',' ').' (Selección Múltiple)', ['class' => 'text-success' ]) }}
                                    <input type="file" name="documentos[{{$item->id}}][]" class="form-control" multiple="multiple">
                                </div>
                            @else
                                <div class="form-group col-md p-1">
                                    {{ Form::label($item->id,strtr($item->nombre,'_',' '), ['class' => 'text-primary' ]) }}
                                    <input type="file" name="documentos[{{$item->id}}]" class="form-control">
                                </div>
                            @endif
                        @else
                            <?php $inicial = true; ?>
                            <div class="row">
                            @if ($item->es_multiple)
                                <div class="form-group col-md p-1 ">
                                    {{ Form::label($item->id,strtr($item->nombre,'_',' ').' (Selección Múltiple)', ['class' => 'text-success' ]) }}
                                    <input type="file" name="documentos[{{$item->id}}][]" class="form-control" multiple="multiple">
                                </div>
                            @else
                                <div class="form-group col-md p-1">
                                    {{ Form::label($item->id,strtr($item->nombre,'_',' '), ['class' => 'text-primary' ]) }}
                                    <input type="file" name="documentos[{{$item->id}}]" class="form-control">
                                </div>
                            @endif
                        @endif
                        
                    @else
                        @if ($item->es_multiple)
                            <div class="form-group col-md p-1">
                                {{ Form::label($item->id,strtr($item->nombre,'_',' ').' (Selección Múltiple)', ['class' => 'text-success' ]) }}
                                <input type="file" name="documentos[{{$item->id}}][]" class="form-control" multiple="multiple">
                            </div>
                        @else
                            <div class="form-group col-md p-1">
                                {{ Form::label($item->id,strtr($item->nombre,'_',' '), ['class' => 'text-primary' ]) }}
                                <input type="file" name="documentos[{{$item->id}}]" class="form-control">
                            </div>
                        @endif
                        
                    @endif
                @endforeach
                            
        </div>

        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <br>
            <a href="{{ route('empleado-expedientes.index') }}" class="btn btn-danger col col-lg-3">{{ __('Cancelar')}}</a>
            <br>
            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-lg-3">Aceptar</button>
        </div>
    </div>



</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#empleado_id').select2();
    </script>
@endpush