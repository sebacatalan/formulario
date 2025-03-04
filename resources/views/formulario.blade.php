@extends('layouts.app')

@section('title', 'Formulario de Turismo')

@section('content')

    <h1>Formulario de Turismo</h1>

    <form action="{{ route('guardar') }}" id="formulario" method="POST">
        @csrf

        <label for="nacionalidad">País de origen:</label>
        <select name="nacionalidad" id="nacionalidad" onchange="verificarNacionalidad()">
            <option value="" selected>Seleccione...</option>
            @foreach ($paises as $pais)
                <option value="{{ $pais }}">{{ $pais }}</option>
            @endforeach
        </select>

        <div id="div_comuna" style="display: none;">
            <label for="comuna">Comuna de residencia:</label>
            <select name="comuna" id="comuna" disabled>
                <option value="" selected>Seleccione...</option>
                @foreach ($comunas as $comunas_chile)
                    <option value="{{ $comunas_chile }}">{{ $comunas_chile }}</option>
                @endforeach
            </select>
        </div>

        <label for="motivo_viaje">Principal motivo del viaje:</label>
        <select name="motivo_viaje" id="motivo_viaje" required>
            <option value="" selected>Seleccione...</option>
            <option value="Turismo de naturaleza">Turismo de naturaleza</option>
            <option value="Turismo de aventura">Turismo de aventura</option>
            <option value="Visita familiar">Visita familiar</option>
            <option value="Eventos">Eventos</option>
            <option value="Trabajo">Trabajo</option>
            <option value="Otros">Otros</option>
        </select>

        <label for="tipo_alojamiento">Tipo de alojamiento:</label>
        <select name="tipo_alojamiento" id="tipo_alojamiento" required>
            <option value="" selected>Seleccione...</option>
            <option value="Hotel">Hotel</option>
            <option value="Cabaña">Cabaña</option>
            <option value="Camping">Camping</option>
            <option value="Hostal">Hostal</option>
            <option value="Casa rodante">Casa rodante</option>
            <option value="Otro">Otro</option>
        </select>

        <label for="descubrimiento">Cómo se enteró de Panguipulli:</label>
        <select name="descubrimiento" id="descubrimiento">
            <option value="" selected>Seleccione...</option>
            <option value="Internet">Internet</option>
            <option value="Recomendación">Recomendación (familiares/amigos)</option>
            <option value="Medios">Medios de comunicación (tv/radio)</option>
            <option value="Otro">Otro</option>
        </select>

        <label for="viaje">Con quién viajó:</label>
        <select name="viaje" id="viaje">
            <option value="" selected>Seleccione...</option>
            <option value="Solo">Solo</option>
            <option value="En pareja">En pareja</option>
            <option value="Con familia">Con familia</option>
            <option value="Con amigos">Con amigos</option>
            <option value="En grupo">En grupo</option>
        </select>

        <label for="transporte">Principal medio de transporte:</label>
        <select name="transporte" id="transporte">
            <option value="" selected>Seleccione...</option>
            <option value="Auto">Auto</option>
            <option value="Bus">Bus</option>
            <option value="Casa rodante">Casa rodante</option>
            <option value="Moto">Moto</option>
            <option value="Bicicleta">Bicicleta</option>
            <option value="Otro">Otro</option>
        </select>

        <label for="actividades_principales">Actividades realizadas:</label>
        <select name="actividades_principales" id="actividades_principales">
            <option value="" selected>Seleccione...</option>
            <option value="Senderismo">Senderismo</option>
            <option value="Deportes acuáticos">Deportes acuáticos</option>
            <option value="Visitas culturales">Visitas culturales</option>
            <option value="Gastronomía">Gastronomía</option>
            <option value="Otros">Otros</option>
        </select>

        <div style="display: flex; justify-content: space-between;">
            <button type="submit">Guardar</button>
            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('descargar.csv') }}" class="btn btn-success">Descargar CSV</a>
            @endif
        </div>
    </form>

    <div id="mensajes"></div>
@endsection

@section('scripts')
    <script>
        function verificarNacionalidad() {
            const nacionalidad = document.getElementById("nacionalidad");
            const div_comuna = document.getElementById("div_comuna");
            const comuna = document.getElementById("comuna");

            if (nacionalidad.value === "Chile") {
                div_comuna.style.display = "block";
                comuna.disabled = false;
            } else {
                div_comuna.style.display = "none";
                comuna.disabled = true;
                comuna.value = "";
            }
        }
    </script>
@endsection