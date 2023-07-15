<div class="box box-info padding-1">
    <div class="box-body">

        <div class="col-sm-4 form-group">
            {{ Form::label('name','Nombre:') }}
            <span style="color:red">*</span>
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @php
            $nombres = [
                1 => 'Finanzas',
                2 => 'Recursos Humanos',
                3 => 'Administración',
                4 => 'Cadena de Suministros',
                5 => 'Archivos',
            ];
        @endphp
        <div class="card">
            <div class="card-body">
                <h5>Selecciona los permisos del rol</h5>
                <hr>
                <?php $secciones = collect($permissions)->groupBy('nomenclatura'); ?>
                <ul class="nav nav-tabs" id="secciones-tab" role="tablist">
                    @foreach ($secciones as $key => $grupo)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="seccion-{{ $key }}-tab" data-toggle="tab" href="#seccion-{{ $key }}" role="tab" aria-controls="seccion-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}"> {{ $nombres[$key] }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="secciones-tab-content">
                    @foreach ($secciones as $key => $grupo)
                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="seccion-{{ $key }}" role="tabpanel" aria-labelledby="seccion-{{ $key }}-tab">
                            <div class="permisos-container">
                                <ul class="permisos-lista list-group list-group-flush">
                                    @foreach ($grupo as $item)
                                        <li class="list-group-item">
                                            {!! Form::checkbox('permissions[]', $item->id, $role->hasPermission($item->id), ['class' => 'mr-1']) !!}
                                            {{ $item->description }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        
        <br>
        <div class="row d-flex justify-content-center">
            <a href="{{ route('roles.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar') }}</a>
            <div class="col col-sm-2"></div>
            <button type="submit" id="btn-aceptar" onclick="myFunction();"
                class="btn btn-primary col col-sm-2">Aceptar</button>
        </div>

    </div>
</div>
