<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('RUC') }}
            <div class="mb-3  row ml-1">
                {!! Form::text('RUC', null, ['class' => 'form-control col-sm-5 p-2', 'id' => 'RUC']) !!}
                <input type="button" id="buscarRUC" value="Buscar por RUC" class="btn btn-primary  ml-2">
                @error('RUC')
                    {!! $errors->first('RUC', '<div class="invalid-feedback">:message</div>') !!}
                @enderror
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('razonSocial') }}
            {{ Form::text('razonSocial', NULL, ['class' => 'form-control', 'placeholder' => 'Razonsocial', 'id' => 'razonSocial']) }}
            {!! $errors->first('razonSocial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', NULL, ['class' => 'form-control' ,'id'=>'direccion', 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', NULL, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', NULL, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('encargado') }}
            {{ Form::text('encargado', NULL, ['class' => 'form-control' . ($errors->has('encargado') ? ' is-invalid' : ''), 'placeholder' => 'Encargado']) }}
            {!! $errors->first('encargado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
@section('js')
<script type="text/javascript">
    var ruc = document.getElementById('RUC');
    var razonsocial = document.getElementById('razonSocial');
    var direcciones = document.getElementById('direccion');
    document.getElementById('buscarRUC').addEventListener('click', function(e) {
        e.preventDefault();
        //alert(ruc.value);
        preguntarRUC(ruc.value);
    });

    function preguntarRUC(dni) {
        $.ajax({
            type: "get",
            url: "https://dniruc.apisperu.com/api/v1/ruc/" +
                dni +
                "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNlbnR1cmlvbmphaW1lQGdtYWlsLmNvbSJ9.yTPvPJzrjUkoUi23-atHS6zUfYa-O55n8UoXHan2uv0",

            dataType: "json",
            success: function(response) {
                if (response.message != "No se encontraron resultadoss.") {

                    razonsocial.value = response.razonSocial;
                    direcciones.value = response.direccion;
                    // nombre.setAttribute("disabled", true);
                    // apellido.setAttribute("disabled", true);
                    // dni1.setAttribute("disabled", true);
                } else {
                    alert("RUC no encontrado");
                }
            },
            error: function(response) {
                console.log(response);

            },
        });
    }
</script>
@endsection
