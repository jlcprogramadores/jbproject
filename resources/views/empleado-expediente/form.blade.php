<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('empleado_id', 'Empleado') }}
            {{ Form::select('empleado_id', $empleado, $empleadoExpediente->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Un Empleado']) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        @foreach ($expediente as $item)
            @if ($item->es_multiple)
                <div class="form-group">
                    {{ Form::label($item->id,$item->nombre) }}
                    <input type="file" name="documentos[{{$item->id}}]" class="form-control">
                </div>
                <div>
                    <label>Factura</label>
                    <input type="button" name="answer" value="Añadir"  class="btn btn-success" onclick="mostrarDiv()" />
                    <div id="apartadoFactura"  style="display:none;">
                        <br>
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <tr>
        
                                <th>Referencia</th>
                                <th>URL</th>
                                <th>Comprobante</th>
                                <th>Fecha Facturación</th>
                                <th>Monto</th>
                                <th>Acción</th>
                            </tr>
                            <tr>
                                <td><input id="referencia_factura" type="text" name="factura[0][referencia_factura]" class="form-control"/></td>
                                <td><input id="url" type="text" name="factura[0][url]" class="form-control"/></td>
                                <td><input id="factura_base64" type="file" name="factura[0][factura_base64]"  class="form-control"/></td>
                                <td><input id="fecha_factura" type="date" name="factura[0][fecha_factura]" class="form-control"/></td>
                                <td><input id="monto" type="number" step="any" name="factura[0][monto]" class="form-control"/></td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Añadir</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            @else
                <div class="form-group">
                    {{ Form::label($item->id,$item->nombre) }}
                    <input type="file" name="documentos[{{$item->id}}]" class="form-control">
                </div>
            @endif
        @endforeach

        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('empleado-expedientes.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#empleado_id').select2();
    </script>
@endpush