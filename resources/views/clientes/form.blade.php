<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="tipoCliente"> TIPO CLIENTE</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" id="naturales" value="natural">
                <label class="form-check-label" for="flexRadioDefault1">
                    Cliente Natural
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" id="juridicos" value="juridico">
                <label class="form-check-label" for="flexRadioDefault2">
                    Cliente Juridico
                </label>
            </div>
        </div>
        <div id="natural" hidden>
            <div class="form-group">
                {{ Form::label('dni') }}
                <div class="mb-3 row ml-1">
                    {!! Form::text('dni', null, [
                        'class' => 'form-control col-sm-5 p-2',
                        'placeholder' => 'DNI del Apoderado',
                        'id' => 'DNI',
                    ]) !!}
                    <input type="button" id="buscarDNI" value="Buscar" class="btn btn-primary  ml-2">
                    {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="form-group">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('apellido') }}
                {{ Form::text('apellido', null, ['class' => 'form-control', 'id' => 'apellido', 'placeholder' => 'Apellido']) }}
                {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('email') }}
                {{ Form::text('emailnatural', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('telefono') }}
                {{ Form::text('telefononatural', null, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('direccion') }}
                {{ Form::text('direccionnatural', null, ['class' => 'form-control','id'=>'direc', 'placeholder' => 'Direccion']) }}
                {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div id="juridico" hidden>
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
                {{ Form::text('razonSocial', null, ['class' => 'form-control', 'id' => 'razonSocial', 'placeholder' => 'Razonsocial']) }}
                {!! $errors->first('razonSocial', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('direccion') }}
                {{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion', 'placeholder' => 'Direccion']) }}
                {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('telefono') }}
                {{ Form::text('telefono', null, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('email') }}
                {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('encargado') }}
                {{ Form::text('encargado', null, ['class' => 'form-control' . ($errors->has('encargado') ? ' is-invalid' : ''), 'placeholder' => 'Encargado']) }}
                {!! $errors->first('encargado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@section('js')
    <script type="text/javascript">
        let juridocos = document.getElementById('juridicos');
        let naturales = document.getElementById('naturales');
        let juridico = document.getElementById('juridico');
        let natural = document.getElementById('natural');

        $(juridocos).click(function() {
            juridico.removeAttribute('hidden');
            natural.setAttribute('hidden', true);

        });
        $(naturales).click(function() {
            natural.removeAttribute('hidden');
            juridico.setAttribute('hidden', true);

        });
    </script>
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
    <script>
        var dni = document.getElementById('DNI');
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        document.getElementById('buscarDNI').addEventListener('click', function(e) {
            e.preventDefault();

            preguntardni(dni.value);
        });

        function preguntardni(dni) {
            $.ajax({
                type: "get",
                url: "https://dniruc.apisperu.com/api/v1/dni/" +
                    dni +
                    "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNlbnR1cmlvbmphaW1lQGdtYWlsLmNvbSJ9.yTPvPJzrjUkoUi23-atHS6zUfYa-O55n8UoXHan2uv0",

                dataType: "json",

                success: function(response) {

                    if (response.message != "No se encontraron resultadoss.") {
                        nombre.value = response.nombres;
                        apellido.value = response.apellidoPaterno + " " + response.apellidoMaterno;

                    } else {
                        alert("DNI no encontrado");

                    }
                },
                error: function(response) {
                    console.log(response);

                },
            });
        }
    </script>
@endsection
