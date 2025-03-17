@extends('layouts.app')

@section('title', 'Formulario de Turismo')

@section('content')

    <h1>Formulario de Turismo</h1>

    <form action="{{ route('guardar') }}" id="formulario" method="POST">
        @csrf

        <label for="motivo_consulta" class="required-label">1.- ¿Cuál es el motivo principal de la consulta?</label>
        <select name="motivo_consulta" id="motivo_consulta" required class="required-field">
            <option value="">Seleccione...</option>
            <option value="Actividades de turismo aventura">Actividades de turismo aventura</option>
            <option value="Lagos y miradores">Lagos y miradores</option>
            <option value="Áreas Silvestres Protegidas por el Estado">Áreas Silvestres Protegidas por el Estado</option>
            <option value="Parques y Reservas Privadas">Parques y Reservas Privadas</option>
            <option value="Saltos de agua y senderos">Saltos de agua y senderos</option>
            <option value="Cultura y patrimonio">Cultura y patrimonio</option>
            <option value="Eventos y actividades recreativas">Eventos y actividades recreativas</option>
            <option value="Alojamiento">Alojamiento</option>
            <option value="Gastronomía">Gastronomía</option>
            <option value="Transporte y accesibilidad">Transporte y accesibilidad</option>
            <option value="Información turística general">Información turística general</option>
            <option value="Pesca recreativa">Pesca recreativa</option>
            <option value="Servicios e infraestructura">Servicios e infraestructura</option>
        </select>
        <!-- CADA UNO DE ESTOS "SUBOPTION" CORRESPONDEN A LA ESPECIFICACIÓN (EN CASO DE EXISITR)
                                                                                                                                                                                 DE CADA UNO DE LOS OPTION ANTERIORES -->
        <div id="subopciones-container">
            <div id="Actividades de turismo aventura" class="subopciones">
                <label> • Especifique:</label>
                <select name="actividades_aventura_sub" required class="required-field">
                    <option value="">Seleccione...</option>
                    <option value="Trekking">Trekking</option>
                    <option value="Kayak">Kayak</option>
                    <option value="Rafting">Rafting</option>
                    <option value="Canopy">Canopy</option>
                    <option value="Ciclismo">Ciclismo</option>
                    <option value="Otros">Otros</option>
                </select>
            </div>
            <div id="Áreas Silvestres Protegidas por el Estado" class="subopciones">
                <label> • Especifique:</label>
                <select name="areas_protegidas_sub" required class="required-field">
                    <option value="">Seleccione...</option>
                    <option value="Parque Nacional Villarrica (sector sur)">Parque Nacional Villarrica (sector sur)</option>
                    <option value="Reserva Nacional Mocho-Choshuenco">Reserva Nacional Mocho-Choshuenco</option>
                </select>
            </div>
            <div id="Parques y Reservas Privadas" class="subopciones">
                <label> • Especifique:</label>
                <select name="parques_reservas_sub" required class="required-field">
                    <option value="">Seleccione...</option>
                    <option value="Reserva Biológica Huilo-Huilo">Reserva Biológica Huilo-Huilo</option>
                    <option value="Otros proyectos de conservación privada">Otros proyectos de conservación privada</option>
                </select>
            </div>
            <div id="Cultura y patrimonio" class="subopciones">
                <label> • Especifique:</label>
                <select name="cultura_patrimonio_sub" required class="required-field">
                    <option value="">Seleccione...</option>
                    <option value="Cultura Mapuche">Cultura Mapuche (comunidades, gastronomía, artesanías)</option>
                    <option value="Ferias costumbristas">Ferias costumbristas</option>
                    <option value="Museos y sitios históricos">Museos y sitios históricos</option>
                </select>
            </div>
            <div id="Eventos y actividades recreativas" class="subopciones">
                <label> • Especifique:</label>
                <select name="eventos_actividades_sub" required class="required-field">
                    <option value="">Seleccione...</option>
                    <option value="Eventos deportivos">Eventos deportivos (maratones, competencias de kayak)</option>
                    <option value="Festivales culturales">Festivales culturales, ferias gastronómicas, conciertos</option>
                </select>
            </div>
            <div id="Transporte y accesibilidad" class="subopciones">
                <label> • Especifique:</label>
                <select name="transporte_accesibilidad_sub" required class="required-field">
                    <option value="">Seleccione...</option>
                    <option value="Estado de rutas">Estado de rutas</option>
                    <option value="Transporte público">Transporte público</option>
                    <option value="Barcazas en lagos">Barcazas en lagos</option>
                    <option value="Arriendo de vehículos">Arriendo de vehículos</option>
                </select>
            </div>
            <div id="Pesca recreativa" class="subopciones">
                <label> • Especifique:</label>
                <select name="pesca_recreativa_sub" required class="required-field">
                    <option value="">Seleccione...</option>
                    <option value="Zonas habilitadas e información general">Zonas habilitadas e información general</option>
                    <option value="Permisos Sernapesca">Permisos Sernapesca</option>
                    <option value="Venta y arriendo de equipos">Venta y arriendo de equipos</option>
                </select>
            </div>
            <div id="Servicios e infraestructura" class="subopciones">
                <label> • Especifique:</label>
                <select name="servicios_infraestructura_sub" required class="required-field">
                    <option value="">Seleccione...</option>
                    <option value="Baños públicos">Baños públicos</option>
                    <option value="WIFI gratuito">WIFI gratuito</option>
                    <option value="Puntos de carga móvil">Puntos de carga móvil</option>
                    <option value="Estacionamientos seguros">Estacionamientos seguros</option>
                </select>
            </div>
        </div>

        <label for="motivo_viaje" class="required-label">2.- ¿Cuál es el motivo del viaje?</label>
        <select name="motivo_viaje" id="motivo_viaje" required class="required-field">
            <option value="">Seleccione...</option>
            <option value="Negocio/Trabajo">Negocio/Trabajo</option>
            <option value="Vacaciones/Turismo">Vacaciones/Turismo</option>
            <option value="Visita a familiares/amigos">Visita a familiares/amigos</option>
            <option value="2da Vivienda">2da Vivienda</option>
        </select>

        <label for="via_acceso">3.- ¿Cuál fue la vía de acceso a nuestra comuna?</label>
        <select name="via_acceso" id="via_acceso">
            <option value="">Seleccione...</option>
            <option value="Desde Ruta 5 por Lanco - Malalhue (CH-203)">Desde Ruta 5 por Lanco - Malalhue (CH-203)</option>
            <option value="Desde Ruta 5 por Los Lagos - Ñancul (T-39)">Desde Ruta 5 por Los Lagos - Ñancul (T-39)</option>
            <option value="Desde La Araucanía por Licanray - Coñaripe (S-95T)">Desde La Araucanía por Licanray - Coñaripe
                (S-95T)</option>
            <option value="Desde La Araucanía por cruce Pata de Gallo Huitag (S-239T)">Desde La Araucanía por cruce Pata de
                Gallo Huitag (S-239T)</option>
            <option value="Paso Hua Hum - Pirehueico (CH-203)">Paso Hua Hum - Pirehueico (CH-203)</option>
            <option value="Paso Carririñe - Liquiñe (CH-201)">Paso Carririñe - Liquiñe (CH-201)</option>
        </select>

        <label for="pais_residencia" class="required-label">4.- ¿Cuál es su país de residencia?</label>
        <select name="pais_residencia" id="pais_residencia" required class="required-field">
            <option value="">Seleccione...</option>
            @foreach ($paises as $pais)
                <option value="{{ $pais }}">{{ $pais }}</option>
            @endforeach
        </select>

        <div id="div_comuna">
            <label for="comuna_residencia"> • ¿Cuál es su comuna de residencia?</label>
            <select name="comuna_residencia" id="comuna_residencia" required class="required-field">
                <option value="">Seleccione...</option>
                @foreach ($comunas as $comuna)
                    <option value="{{ $comuna }}">{{ $comuna }}</option>
                @endforeach
            </select>
        </div>

        <label for="tipo_transporte" class="required-label">5.- ¿Qué tipo de transporte utilizó o utilizará principalmente
            para visitar la
            comuna?</label>
        <select name="tipo_transporte" id="tipo_transporte" required class="required-field">
            <option value="">Seleccione...</option>
            <option value="Automóvil">Automóvil (city car/sedan/van/hatchback/jeep/camionetas/utilitario/etc.)</option>
            <option value="Motorhome">Motorhome (Casa rodante/Caravana)</option>
            <option value="Bus">Bus</option>
            <option value="Moto">Moto</option>
            <option value="Bicicleta">Bicicleta</option>
        </select>
        <label for="cantidad_viajeros" class="required-label">6.- ¿Cuántas personas conforman su grupo de viaje? (incluyendo
            al encuestado)
            <span class="required"></span>
        </label>
        <input type="number" name="cantidad_viajeros" id="cantidad_viajeros" min="1" max="999" required
            class="input-cantidad" placeholder="0">

        <div class="formulario-encuesta">
            <fieldset>
                <legend>Rango etario de su grupo de viaje</legend>

                <div>
                    <label for="edad_0_12" class="label-edad">De 0 a 12 años:</label>
                    <input type="number" name="edad_0_12" id="edad_0_12" min="0" placeholder="0">
                </div>

                <div>
                    <label for="edad_13_25" class="label-edad">De 13 a 25 años:</label>
                    <input type="number" name="edad_13_25" id="edad_13_25" min="0" placeholder="0">
                </div>

                <div>
                    <label for="edad_26_40" class="label-edad">De 26 a 40 años:</label>
                    <input type="number" name="edad_26_40" id="edad_26_40" min="0" placeholder="0">
                </div>

                <div>
                    <label for="edad_41_60" class="label-edad">De 41 a 60 años:</label>
                    <input type="number" name="edad_41_60" id="edad_41_60" min="0" placeholder="0">
                </div>

                <div>
                    <label for="edad_61_80" class="label-edad">De 61 a 80 años:</label>
                    <input type="number" name="edad_61_80" id="edad_61_80" min="0" placeholder="0">
                </div>

                <div>
                    <label for="edad_mas_81" class="label-edad">Más de 81 años:</label>
                    <input type="number" name="edad_mas_81" id="edad_mas_81" min="0" placeholder="0">
                </div>
            </fieldset>
        </div>

        <label for="visitas_comuna">8.- Contando la visita actual, ¿Cuántas veces ha visitado la comuna?</label>
        <input type="number" name="visitas_comuna" id="visitas_comuna" min="1" class="input-cantidad" placeholder="0">

        <label for="volver_visitar">9.- ¿Volvería a visitar la comuna?</label>
        <select name="volver_visitar" id="volver_visitar">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
            <option value="Prefiere no responder">Prefiere no responder</option>
        </select>

        <label for="tipo_alojamiento" class="required-label">10.- En caso de pernoctar en la comuna ¿Cuál fue o es el
            principal tipo de alojamiento
            que utilizó o utilizará en su estadía?</label>
        <select name="tipo_alojamiento" id="tipo_alojamiento" required class="required-field">
            <option value="">Seleccione...</option>
            <option value="2da vivienda">2da vivienda</option>
            <option value="Cabaña/Domo">Cabaña/Domo</option>
            <option value="Camping">Camping</option>
            <option value="Casa de familiares y/o amigos">Casa de familiares y/o amigos</option>
            <option value="Hostal/Residencial/Hostel/B&B/Hostería">Hostal /Residencial /Hostel / B&B/ Hostería</option>
            <option value="Hotel/Lodge">Hotel/Lodge</option>
            <option value="Motorhome">Motorhome (Casa rodante/Caravana)</option>
            <option value="No pernocta">No pernocta</option>
        </select>

        <label for="noches_alojamiento" class="required-label">11.- ¿Cuántas noches en total se alojará o alojó en la
            comuna?</label>
        <input type="number" name="noches_alojamiento" id="noches_alojamiento" min="1" required class="input-cantidad"
            placeholder="0">

        <label for="presupuesto_viaje">12.- Aproximadamente ¿Cuál es el presupuesto estimado para usted o su grupo de
            viaje?</label>
        <select name="presupuesto_viaje" id="presupuesto_viaje">
            <option value="">Seleccione...</option>
            <option value="Menos de $50.000">Menos de $50.000</option>
            <option value="$50.000 - $100.000">$50.000 - $100.000</option>
            <option value="$100.000 - $150.000">$100.000 - $150.000</option>
            <option value="$150.000 - 200.000">$150.000 – 200.000</option>
            <option value="$200.000 - 300.000">$200.000 – 300.000</option>
            <option value="$300.000 - 500.000">$300.000 – 500.000</option>
            <option value="$500.000 - 1.000.000">$500.000 – 1.000.000</option>
            <option value="Más de $1.000.000">Más de $1.000.000</option>
            <option value="Prefiere no responder">Prefiere no responder</option>
        </select>

        <label>13.- ¿Cuáles son las principales actividades turísticas que Ud. realiza o realizó en la comuna? (Escoja 2
            preferencias)</label>
        <div class="checkbox-container">
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_1"
                    value="Avistamiento de flora y fauna" class="checkbox">
                <label for="actividad_1">Avistamiento de flora y fauna</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_2"
                    value="Baños en playas de ríos o lagos" class="checkbox">
                <label for="actividad_2">Baños en playas de ríos o lagos</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_3" value="Baños termales"
                    class="checkbox">
                <label for="actividad_3">Baños termales</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_4"
                    value="Gastronomía y ferias costumbristas" class="checkbox">
                <label for="actividad_4">Gastronomía y ferias costumbristas</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_5"
                    value="Navegación en lagos (kayak/veleros/sodiac/katamaran/laser/etc.)" class="checkbox">
                <label for="actividad_5">Navegación en lagos (kayak/veleros/sodiac/katamaran/laser/etc.)</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_6"
                    value="Navegación en rio (kayak y/o rafting)" class="checkbox">
                <label for="actividad_6">Navegación en rio (kayak y/o rafting)</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_7"
                    value="Senderismo /Hiking (nivel de exigencia bajo)" class="checkbox">
                <label for="actividad_7">Senderismo /Hiking (nivel de exigencia bajo)</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_8"
                    value="Trekking/ excursionismo (nivel de exigencia medio)" class="checkbox">
                <label for="actividad_8">Trekking/ excursionismo (nivel de exigencia medio)</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_9" value="Turismo mapuche"
                    class="checkbox">
                <label for="actividad_9">Turismo mapuche</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_10" value="Tirolesa/Canopy"
                    class="checkbox">
                <label for="actividad_10">Tirolesa/Canopy</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="actividades_turisticas[]" id="actividad_11" value="Otras" class="checkbox">
                <label for="actividad_11">Otras</label>
            </div>
        </div>

        <label>14.- Según su experiencia ¿Cuáles son los atractivos turísticos de la comuna que Ud. recomendaría para
            visitar? (Escoja 2 preferencias)</label>
        <div class="checkbox-container">
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_1"
                    value="Gastronomía y ferias costumbristas">
                <label for="atractivo_1">Gastronomía y ferias costumbristas</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_2" value="Lagos">
                <label for="atractivo_2">Lagos</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_3"
                    value="Áreas Silvestres Protegidas por el Estado">
                <label for="atractivo_3">Áreas Silvestres Protegidas por el Estado</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_4" value="Parques/Reservas Privadas">
                <label for="atractivo_4">Parques/Reservas Privadas</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_5" value="Ríos">
                <label for="atractivo_5">Ríos</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_6" value="Rutas">
                <label for="atractivo_6">Rutas</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_7" value="Humedales">
                <label for="atractivo_7">Humedales</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_8" value="Saltos de Agua">
                <label for="atractivo_8">Saltos de Agua</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_9" value="Termas">
                <label for="atractivo_9">Termas</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_10" value="Volcanes">
                <label for="atractivo_10">Volcanes</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="atractivos_turisticos[]" id="atractivo_11" value="Otros">
                <label for="atractivo_11">Otros</label>
            </div>
        </div>

        <label for="ecologia_panguipulli">15.- En una escala de 1 a 10, ¿Usted considera que Panguipulli es una comuna
            preocupada por la ecología?</label>
        <input type="number" name="ecologia_panguipulli" id="ecologia_panguipulli" min="1" max="10" class="input-cantidad"
            placeholder="0">

        <label>16.- ¿Cuál fue su principal problema que ha encontrado durante su estadía en nuestra comuna? (Escoger máximo
            2 opciones)</label>
        <div class="checkbox-container">
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_1" value="Conectividad (wifi/telefonía)">
                <label for="problema_1">Conectividad (wifi/telefonía)</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_2"
                    value="Dificultades en la accesibilidad y caminos para los diferentes atractivos">
                <label for="problema_2">Dificultades en la accesibilidad y caminos para los diferentes atractivos</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_3" value="Falta de baños públicos">
                <label for="problema_3">Falta de baños públicos</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_4"
                    value="Falta de estacionamientos y/o altos precios de estos">
                <label for="problema_4">Falta de estacionamientos y/o altos precios de estos</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_5"
                    value="Falta de oferta y/o calidad de alojamientos">
                <label for="problema_5">Falta de oferta y/o calidad de alojamientos</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_6"
                    value="Falta de oferta y/o calidad de actividades/panoramas">
                <label for="problema_6">Falta de oferta y/o calidad de actividades/panoramas</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_7"
                    value="Falta de oferta y/o calidad transporte público">
                <label for="problema_7">Falta de oferta y/o calidad transporte público</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_8" value="Falta de señaléticas/información">
                <label for="problema_8">Falta de señaléticas/información</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_9"
                    value="Limpieza y mantención de ciudades/pueblos/playas">
                <label for="problema_9">Limpieza y mantención de ciudades/pueblos/playas</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_10"
                    value="Precios elevados en los servicios">
                <label for="problema_10">Precios elevados en los servicios</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_11" value="Otro">
                <label for="problema_11">Otro</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="problemas_estadia[]" id="problema_12" value="Ningún problema">
                <label for="problema_12">Ningún problema</label>
            </div>
        </div>
        <label for="medio_informacion">17.- ¿Cuál fue el principal medio de información usado para planificar su visita a la
            comuna?</label>
        <select name="medio_informacion" id="medio_informacion">
            <option value="">Seleccione...</option>
            <option value="Agencia de Viajes/Tour operador">Agencia de Viajes/Tour operador</option>
            <option value="Explorando durante la ruta">Explorando durante la ruta</option>
            <option value="Páginas web">Páginas web</option>
            <option value="Redes sociales">Redes sociales</option>
            <option value="Amigos/familia/colegas">Amigos/familia/colegas</option>
            <option value="Periódicos/Revistas impresas">Periódicos/Revistas impresas</option>
            <option value="Televisión">Televisión</option>
            <option value="Otro medio">Otro medio</option>
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
        document.addEventListener('DOMContentLoaded', function () {
            const motivoSelect = document.getElementById('motivo_consulta');
            const subopcionesDivs = document.querySelectorAll('.subopciones');
            const subopcionesSelects = document.querySelectorAll('.subopciones select');
            const paisSelect = document.getElementById('pais_residencia');
            const comunaDiv = document.getElementById('div_comuna');
            const comunaSelect = document.getElementById('comuna_residencia');
            const tipoAlojamiento = document.getElementById('tipo_alojamiento');
            const nochesAlojamiento = document.getElementById('noches_alojamiento');
            const labelNochesAlojamiento = document.querySelector('label[for="noches_alojamiento"]');
            const checkboxesActividades = document.querySelectorAll('input[name="actividades_turisticas[]"]');
            const checkboxesAtractivos = document.querySelectorAll('input[name="atractivos_turisticos[]"]');
            const checkboxesProblemas = document.querySelectorAll('input[name="problemas_estadia[]"]');

            // Ocultar el div de comuna si el país no es Chile
            if (paisSelect.value !== 'Chile') {
                comunaDiv.style.display = 'none';
                if (comunaSelect) comunaSelect.removeAttribute('required');
            }

            // Función para actualizar el campo de noches de alojamiento
            const actualizarNochesAlojamiento = () => {
                const noPernocta = tipoAlojamiento.value === 'No pernocta';
                nochesAlojamiento.value = noPernocta ? 0 : nochesAlojamiento.value;
                nochesAlojamiento.disabled = noPernocta;
                nochesAlojamiento.classList.toggle('pregunta-bloqueada', noPernocta);
                labelNochesAlojamiento.classList.toggle('pregunta-bloqueada', noPernocta);

                // Quitar o añadir el atributo required según corresponda
                if (noPernocta) {
                    nochesAlojamiento.removeAttribute('required');
                } else if (nochesAlojamiento.hasAttribute('data-required')) {
                    nochesAlojamiento.setAttribute('required', '');
                }
            };

            // Función para limitar selección de checkboxes
            const limitarCheckboxes = (checkboxes, max) => {
                let checkedCount = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) checkedCount++;

                    checkbox.addEventListener('change', function () {
                        checkedCount += this.checked ? 1 : -1;
                        if (checkedCount > max) {
                            this.checked = false;
                            checkedCount--;
                            alert(`Solo puede seleccionar un máximo de ${max} opciones.`);
                        }
                    });
                });
            };

            // Inicializar: quitar el required de todas las subopciones al principio
            subopcionesSelects.forEach(select => {
                // Guardar si originalmente era requerido
                if (select.hasAttribute('required')) {
                    select.setAttribute('data-required', 'true');
                    select.removeAttribute('required');
                }
            });

            // Mostrar/ocultar subopciones al cambiar motivo principal
            motivoSelect.addEventListener('change', function () {
                // Primero, ocultar todas y quitar required
                subopcionesDivs.forEach(div => {
                    div.style.display = 'none';
                    const selects = div.querySelectorAll('select');
                    selects.forEach(select => select.removeAttribute('required'));
                });

                // Luego mostrar la subopción correspondiente y añadir required si era requerido originalmente
                const selectedValue = this.value;
                if (selectedValue) {
                    const subopcionDiv = document.getElementById(selectedValue);
                    if (subopcionDiv) {
                        subopcionDiv.style.display = 'block';
                        const selects = subopcionDiv.querySelectorAll('select');
                        selects.forEach(select => {
                            if (select.hasAttribute('data-required')) {
                                select.setAttribute('required', '');
                            }
                        });
                    }
                }
            });

            // Mostrar/ocultar campo de comuna según país seleccionado
            paisSelect.addEventListener('change', function () {
                const esChile = this.value === 'Chile';
                comunaDiv.style.display = esChile ? 'block' : 'none';

                // Manejar el atributo required para comuna
                if (comunaSelect) {
                    if (esChile && comunaSelect.hasAttribute('data-required')) {
                        comunaSelect.setAttribute('required', '');
                    } else {
                        comunaSelect.removeAttribute('required');
                    }
                }
            });
            // Obtener todos los campos obligatorios
            const requiredFields = document.querySelectorAll('.required-field');

            // Función para verificar y actualizar el estilo
            function updateFieldStyle(field) {
                if (field.value !== '') {
                    field.classList.remove('required-field');
                    field.classList.add('valid-field');
                } else {
                    field.classList.remove('valid-field');
                    field.classList.add('required-field');
                }
            }

            // Verificar el estado inicial de los campos (por si hay valores predefinidos)
            requiredFields.forEach(field => {
                updateFieldStyle(field);

                // Agregar evento para cuando cambie el valor
                field.addEventListener('change', function () {
                    updateFieldStyle(this);
                });
            });

            // Configurar comportamiento del campo de noches de alojamiento
            tipoAlojamiento.addEventListener('change', actualizarNochesAlojamiento);
            actualizarNochesAlojamiento();

            // Limitar selección de checkboxes
            limitarCheckboxes(checkboxesActividades, 2);
            limitarCheckboxes(checkboxesAtractivos, 2);
            limitarCheckboxes(checkboxesProblemas, 2);

            // Validación antes de enviar
            formulario.addEventListener('submit', function (event) {
                // Asegurarse de que los campos ocultos no sean requeridos
                document.querySelectorAll('div[style*="display: none"] select[required], div[style*="display: none"] input[required]').forEach(element => {
                    element.removeAttribute('required');
                });
            });
        });
    </script>
@endsection