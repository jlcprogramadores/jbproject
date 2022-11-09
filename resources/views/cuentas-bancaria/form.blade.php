<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proveedore_id') }}
            {{ Form::select('proveedore_id',$proveedore,$cuentasBancaria->proveedore_id, ['class' => 'form-control' . ($errors->has('proveedore_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Proveedor']) }}
            {!! $errors->first('proveedore_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <?php 
                $nombreBanco = ['ABC Capital','American Express Bank (México)','Banca Afirme','Banca Mifel','Banco Actinver','Banco Autofin México','Banco Azteca',
                'Banco Bancrea','Banco Base','Banco Covalto','Banco Compartamos','Banco Credit Suisse (México)','Banco de Inversión Afirme','Banco del Bajío','Banco Forjadores',
                'Banco Inbursa','Banco Inmobiliario Mexicano','Banco Invex','Banco JP Morgan','Banco KEB Hana México','Banco Monex','Banco Multiva','Banco PagaTodo',
                'Banco Regional de Monterrey','Banco S3 Caceis México','Banco Sabadell','Banco Santander','Banco Shinhan de México','Banco Ve por Más','BanCoppel',
                'Bank of America Mexico','Bank of China Mexico','Bankaool','Banorte','Bansí','Barclays Bank México','BBVA México','BNP Paribas','Citibanamex',
                'CIBanco','Consubanco','Deutsche Bank México','Fundación Dondé Banco','HSBC México','Industrial and Commercial Bank of China','Intercam Banco',
                'Mizuho Bank','MUFG Bank Mexico','Scotiabank'];
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

    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('cuentas-bancarias.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>