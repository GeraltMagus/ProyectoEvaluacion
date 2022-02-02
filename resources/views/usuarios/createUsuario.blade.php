@extends('layouts.plantillaBase')

@section('contenido')

    <h2>Crear Usuario</h2>
    <form action="/usuarios" method="POST">
        @csrf
        <div class="mb-3">
            <h3>Datos Personales</h3>
            <label for="" class="form-label">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" onkeydown="return /[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/i.test(event.key)" type="text"
                required />
            <label for="" class="form-label">Apellido paterno</label>
            <input class="form-control" id="apellido_paterno" name="apellido_paterno"
                onkeydown="return /[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/i.test(event.key)" type="text" required />
            <label for="" class="form-label">Apellido materno</label>
            <input class="form-control" id="apellido_materno" name="apellido_materno"
                onkeydown="return /[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/i.test(event.key)" type="text" required />
            <label for="" class="form-label">Fecha de Nacimiento</label>
            <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" type="date" max="2000-01-01"
                required />
            <label for="" class="form-label">Sexo</label>
            <select class="form-control" name="sexo" id="sexo">
                <option selected="selected" value=""></option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
            <h3>Datos de Ubicación</h3>
            <label for="" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control"></select>
            <label for="" class="form-label">Ciudad</label>
            <select name="ciudad" id="ciudad" class="form-control"></select>
            <label for="" class="form-label">Calle</label>
            <input class="form-control" id="calle" name="calle" onkeydown="return /[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/i.test(event.key)" type="text"
                required />
            <label for="" class="form-label">Numero</label>
            <input class="form-control" id="numero_exterior" name="numero_exterior" type="number" required />
            <label for="" class="form-label">Numero interior</label>
            <input class="form-control" id="numero_interior" name="numero_interior" type="number" />
            <label for="" class="form-label">Colonia</label>
            <input class="form-control" id="colonia" name="colonia" onkeydown="return /[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/i.test(event.key)"
                type="text" required />
            <h3>Datos Extra</h3>
            <label for="" class="form-label">Habilidades</label>
            <br>
            @foreach ($habilidades as $habilidad)
                <input type="checkbox" name="{{ $habilidad->nombre }}" value="{{ $habilidad->id }}">
                <label for="">{{ $habilidad->nombre }}</label>
                @if ($habilidad->nombre === 'Otros')
                    <input id="otros" type="text" enabled=false required>
                @endif
            @endforeach
            <br>
            <a href="/usuarios" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>


    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //Enero es 0
        //hoy hace 16 años
        var yyyy = today.getFullYear() - 16;
        //formato de 2 digitos para dia y mes
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        today = yyyy + '-' + mm + '-' + dd;
        //lo establecemos como valor máximo para evitar gente menor de 16 años
        document.getElementById("fecha_nacimiento").setAttribute("max", today);
        $(document).ready(function() {
            $.ajax({
                url: 'https://api.copomex.com/query/get_estados?token=2faf8062-90fb-4409-bdda-2975b2fcd899',
                method: "GET",
                dataType: "json",
                success: function(data) {
                    var estados = ""
                    $.each(data.response.estado, function(key, value) {
                        estados += "<option value='" + value + "'>" + value + "</option>"
                    });
                    $("#estado").append(estados);
                }
            })
        });

        $('#estado').on('change', function(e) {
            var opcionSeleccionada = $("option:selected", this);
            var estado = opcionSeleccionada.val();
            var url = ""
            estadoSeleccionado = estado;
            $.ajax({
                url: 'https://api.copomex.com/query/get_municipio_por_estado/' + estado +
                    '?token=2faf8062-90fb-4409-bdda-2975b2fcd899',
                method: "GET",
                dataType: "json",
                success: function(data) {
                    var municipios = ""
                    $.each(data.response.municipios, function(key, value) {
                        municipios += "<option value='" + value + "'>" + value + "</option>"
                    });
                    $("#ciudad").append(municipios);
                },
                error: function(error) {
                    console.log(error);
                },
                fail: (function(status) {
                    alert("wut?");
                })
            })
        });
    </script>
@endsection
