    <div class="box box-info padding-1">
        <div class="box-body">


            <?php
            // parte de los headers
            $menuAnterior = null;
            $contador = 0;
            $titulos = ['Finanzas', 'Recursos Humanos', 'Administración'];
            $indicadorEnPM = '00';
            $esEspecial = false;
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="form-group">
                        {{ Form::label('Nombre') }}
                        {{ Form::text('name', $rol->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <?php
                        //  parte de los headers
                        $menu = substr($permission->nomenclatura, 3, 2);
                        $menuEsIgual = $menuAnterior == $menu;
                        $menuAnterior = $menu;
                        // parte submenus
                        $subMenu = substr($permission->nomenclatura, 15, 2);
                        $subMenuEsIgual = $indicadorEnPM == $subMenu;
                        $esEspecial = $subMenu == 'cf';
                        ?>
                        {{-- Cuando es el primero --}}
                        @if ($menuEsIgual == false && $contador == 0)
                            <div class="col-sm" data-bs-spy="scroll">
                                <li class="list-group-item list-group-item-primary">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                            {{ $permission->description }}
                                        </div>
                                        <div class="fw-bold"> {{ $titulos[$contador] }}</div>
                                    </div>
                                </li>
                                <ul class="list-group">
                                    <?php $contador++; ?>
                                @elseif($menuEsIgual == true)
                                    @if ($subMenuEsIgual)
                                        <li class="list-group-item list-group-item-secondary">
                                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                            {{ $permission->description }}
                                        </li>
                                    @else
                                        <li class="list-group-item">
                                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                            {{ $permission->description }}
                                        </li>
                                    @endif
                                @elseif($menuEsIgual == false)
                                </ul>
                            </div>
                            <div class="col-sm" data-bs-spy="scroll">
                                <li class="list-group-item list-group-item-primary">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                            {{ $permission->description }}
                                        </div>
                                        <div class="fw-bold">{{ $titulos[$contador] }}</div>
                                    </div>
                                </li>
                                <ul class="list-group">
                                    <?php $contador++; ?>
                        @endif
                    @endforeach
                    </ul>
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
