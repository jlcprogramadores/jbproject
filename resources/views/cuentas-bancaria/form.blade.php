@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        
        <?php 
        if(request()->id != ''){
            $select = [request()->id => request()->nombre];
        }else{
            $select = $proveedore;
        }
        ?>



        <div class="form-group">
            {{ Form::label('proveedore_id', 'Proveedor') }}
            {{ Form::select('proveedore_id',$select,$cuentasBancaria->proveedore_id, ['class' => 'form-control' . ($errors->has('proveedore_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('proveedore_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>





        <div class="form-group">
            <?php 
                $nombreBanco = [
                'ABC Capital' => 'ABC Capital',
                'American Express Bank (México)' => 'American Express Bank (México)',
                'Banca Afirme' => 'Banca Afirme',
                'Banca Mifel' => 'Banca Mifel',
                'Banco Actinver' => 'Banco Actinver',
                'Banco Autofin México' => 'Banco Autofin México',
                'Banco Azteca' => 'Banco Azteca',

                'Banco Bancrea' => 'Banco Bancrea',
                'Banco Base' => 'Banco Base',
                'Banco Covalto' => 'Banco Covalto',
                'Banco Compartamos' => 'Banco Compartamos',
                'Banco Credit Suisse (México)' => 'Banco Credit Suisse (México)',
                'Banco de Inversión Afirme' => 'Banco de Inversión Afirme',
                'Banco del Bajío' => 'Banco del Bajío',
                'Banco Forjadores' => 'Banco Forjadores',

                'Banco Inbursa' => 'Banco Inbursa',
                'Banco Inmobiliario Mexicano' => 'Banco Inmobiliario Mexicano',
                'Banco Invex' => 'Banco Invex',
                'Banco JP Morgan' => 'Banco JP Morgan',
                'Banco KEB Hana México' => 'Banco KEB Hana México',
                'Banco Monex' => 'Banco Monex',
                'Banco Multiva' => 'Banco Multiva',
                'Banco PagaTodo' => 'Banco PagaTodo',

                'Banco Regional de Monterrey' => 'Banco Regional de Monterrey',
                'Banco S3 Caceis México' => 'Banco S3 Caceis México',
                'Banco Sabadell' => 'Banco Sabadell',
                'Banco Santander' => 'Banco Santander',
                'Banco Shinhan de México' => 'Banco Shinhan de México',
                'Banco Ve por Más' => 'Banco Ve por Más',
                'BanCoppel' => 'BanCoppel',

                'Bank of America Mexico' => 'Bank of America Mexico',
                'Bank of China Mexico' => 'Bank of China Mexico',
                'Bankaool' => 'Bankaool',
                'Banorte' => 'Banorte',
                'Bansí' => 'Bansí',
                'Barclays Bank México' => 'Barclays Bank México',
                'BBVA México' => 'BBVA México',
                'BNP Paribas' => 'BNP Paribas',
                'Citibanamex' => 'Citibanamex',

                'CIBanco' => 'CIBanco',
                'Consubanco' => 'Consubanco',
                'Deutsche Bank México' => 'Deutsche Bank México',
                'Fundación Dondé Banco' => 'Fundación Dondé Banco',
                'HSBC México' => 'HSBC México',
                'Industrial and Commercial Bank of China' => 'Industrial and Commercial Bank of China',
                'Intercam Banco' => 'Intercam Banco',

                'Mizuho Bank' => 'Mizuho Bank',
                'MUFG Bank Mexico' => 'MUFG Bank Mexico',
                'Scotiabank' => 'Scotiabank'
            ];
            ?>
            {{ Form::label('banco') }}
            {{ Form::select('banco', $nombreBanco, $cuentasBancaria->banco, ['class' => 'form-control' . ($errors->has('banco') ? ' is-invalid' : ''), 'placeholder' => 'Banco']) }}
            {!! $errors->first('banco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('titular_banco') }}
            {{ Form::text('titular_banco', $cuentasBancaria->titular_banco, ['class' => 'form-control' . ($errors->has('titular_banco') ? ' is-invalid' : ''), 'placeholder' => 'Titular Banco']) }}
            {!! $errors->first('titular_banco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuenta') }}
            {{ Form::number('cuenta', $cuentasBancaria->cuenta, ['class' => 'form-control' . ($errors->has('cuenta') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta']) }}
            {!! $errors->first('cuenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clabe') }}
            {{ Form::number('clabe', $cuentasBancaria->clabe, ['class' => 'form-control' . ($errors->has('clabe') ? ' is-invalid' : ''), 'placeholder' => 'Clabe']) }}
            {!! $errors->first('clabe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tarjeta') }}
            {{ Form::number('tarjeta', $cuentasBancaria->tarjeta, ['class' => 'form-control' . ($errors->has('tarjeta') ? ' is-invalid' : ''), 'placeholder' => 'Tarjeta']) }}
            {!! $errors->first('tarjeta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('es_activo') }}
            {{ Form::text('es_activo', 1, ['class' => 'form-control' . ($errors->has('es_activo') ? ' is-invalid' : ''), 'placeholder' => 'Es Activo']) }}
            {!! $errors->first('es_activo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <br>
        <a href="javascript:history.back()" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#proveedore_id').select2();
        $('#banco').select2();
    </script>
@endpush
