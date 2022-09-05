<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('vehiculo_id') }}
            {{ Form::text('vehiculo_id', $vehiculoProblema->vehiculo_id, ['class' => 'form-control' . ($errors->has('vehiculo_id') ? ' is-invalid' : ''), 'placeholder' => 'Vehiculo Id']) }}
            {!! $errors->first('vehiculo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('problema_id') }}
            {{ Form::text('problema_id', $vehiculoProblema->problema_id, ['class' => 'form-control' . ($errors->has('problema_id') ? ' is-invalid' : ''), 'placeholder' => 'Problema Id']) }}
            {!! $errors->first('problema_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>