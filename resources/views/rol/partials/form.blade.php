@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $rol->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

            <?php 
                // parte de los headers
                $menuAnterior = null;
                $contador = 0;
                $titulos = array('Finanzas', 'Recursos Humanos', 'Administración');
                $indicadorEnPM = '00';
            ?>
    
    <div class="container">
        <div class="row">


            
            @foreach ($permissions as $permission)
                <?php 
                    //  parte de los headers 
                    $menu = substr($permission->nomenclatura,3, 2); 
                    $menuEsIgual = $menuAnterior == $menu;
                    $menuAnterior = $menu;
                    // parte submenus
                    $subMenu = substr($permission->nomenclatura,15, 2); 
                    $subMenuEsIgual = $indicadorEnPM == $subMenu;
                ?>
                {{-- Cuando es el primero --}}
                @if ($menuEsIgual == false && $contador == 0)
                    <div class="col-sm"  data-bs-spy="scroll">
                    <li class="list-group-item list-group-item-primary"> 
                        <div class="d-flex justify-content-between">
                            <div>
                                {!! Form::checkbox('permissions[]',$permission->id,null,['class' => 'mr-1']) !!}
                                {{$permission->description}}
                            </div>
                            <div class="fw-bold"> {{$titulos[$contador]}}</div> 
                        </div>
                    </li>
                    <ul class="list-group">

                    <?php $contador++?>
    
                @elseif($menuEsIgual == true)
                    @if ($subMenuEsIgual)
                        <li class="list-group-item list-group-item-secondary">
                            {!! Form::checkbox('permissions[]',$permission->id,null,['class' => 'mr-1']) !!}
                            {{$permission->description}}
                        </li>                    
                    @else
                        <li class="list-group-item">
                            {!! Form::checkbox('permissions[]',$permission->id,null,['class' => 'mr-1']) !!}
                            {{$permission->description}}
                        </li>
                    @endif
    
                @elseif($menuEsIgual == false)
                    </ul>
                    </div>
                    <div class="col-sm"  data-bs-spy="scroll">
    
                    <li class="list-group-item list-group-item-primary"> 
                        <div class="d-flex justify-content-between">
                            <div >
                                {!! Form::checkbox('permissions[]',$permission->id,null,['class' => 'mr-1']) !!}
                                {{$permission->description}}
                            </div>
                            <div class="fw-bold" >{{$titulos[$contador]}}</div> 
                        </div>
                    </li>
                    <ul class="list-group">

                    <?php $contador++?>
                
                @endif
    
                    
            @endforeach
            </ul>
            </div>




        </div>
    </div>

            


    </div>
    <div class="box-footer mt20">
        <a class="btn btn-danger" href="{{ route('roles.index') }}"> Atrás</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif



