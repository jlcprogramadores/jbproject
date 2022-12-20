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
                        <?php 
                           $mostar= substr($permission->nomenclatura, 5); 
                           dd($mostar);
                        ?>
                        {{dd($mostar)}}
                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                              <h5 class="card-title">Light card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
                          
                        {!! Form::checkbox('permissions[]',$permission->id,null,['class' => 'mr-1']) !!}
                        {{$permission->description}}
                    </label>
                </div>
            @endforeach
        </div>
    <div class="box-footer mt20">
        <a class="btn btn-danger" href="{{ route('roles.index') }}"> Atrás</a>
        <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif