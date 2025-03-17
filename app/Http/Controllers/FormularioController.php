<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respuesta;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use League\Csv\Writer;
use SplTempFileObject;
use Illuminate\Support\Facades\Auth;

class FormularioController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        // Definir las rutas de los archivos JSON
        $rutaPaises = resource_path("paises.json");
        $rutaComunas = resource_path("comunas.json");

        // Variables para almacenar los datos
        $paises = [];
        $comunas = [];

        // Leer y decodificar paises.json
        if (File::exists($rutaPaises)) {
            $paisesJson = File::get($rutaPaises);
            $paises = json_decode($paisesJson, true);

            // Verificar si el JSON es válido
            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error("Error al decodificar paises.json: " . json_last_error_msg());
                $paises = [];
            }
        } else {
            Log::warning("El archivo paises.json no existe.");
        }

        // Leer y decodificar comunas.json
        if (File::exists($rutaComunas)) {
            $comunasJson = File::get($rutaComunas);
            $comunas = json_decode($comunasJson, true);

            // Verificar si el JSON es válido
            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error("Error al decodificar comunas.json: " . json_last_error_msg());
                $comunas = [];
            }
        } else {
            Log::warning("El archivo comunas.json no existe.");
        }

        // Pasar los datos a la vista
        return view('formulario', compact('paises', 'comunas'));
    }

    public function guardar(Request $request)
    {
        try {
            $motivoConsulta = $request->input('motivo_consulta');
            $motivoConsultaEspecifico = null;

            switch ($motivoConsulta) {
                case 'Actividades de turismo aventura':
                    $motivoConsultaEspecifico = $request->input('actividades_aventura_sub');
                    break;
                case 'Áreas Silvestres Protegidas por el Estado':
                    $motivoConsultaEspecifico = $request->input('areas_protegidas_sub');
                    break;
                case 'Parques y Reservas Privadas':
                    $motivoConsultaEspecifico = $request->input('parques_reservas_sub');
                    break;
                case 'Cultura y patrimonio':
                    $motivoConsultaEspecifico = $request->input('cultura_patrimonio_sub');
                    break;
                case 'Eventos y actividades recreativas':
                    $motivoConsultaEspecifico = $request->input('eventos_actividades_sub');
                    break;
                case 'Transporte y accesibilidad':
                    $motivoConsultaEspecifico = $request->input('transporte_accesibilidad_sub');
                    break;
                case 'Pesca recreativa':
                    $motivoConsultaEspecifico = $request->input('pesca_recreativa_sub');
                    break;
                case 'Servicios e infraestructura':
                    $motivoConsultaEspecifico = $request->input('servicios_infraestructura_sub');
                    break;
            }

            $actividades = $request->input('actividades_turisticas');
            $atractivos = $request->input('atractivos_turisticos');
            $problemas = $request->input('problemas_estadia');

            $respuesta = new Respuesta();
            $respuesta->nombre = Auth::user()->nombre;
            $respuesta->fecha = now()->toDateString();
            $respuesta->hora = now()->toTimeString();
            $respuesta->motivo_consulta = $motivoConsulta;
            $respuesta->motivo_consulta_especifico = $motivoConsultaEspecifico;
            $respuesta->motivo_viaje = $request->input('motivo_viaje');
            $respuesta->via_acceso = $request->input('via_acceso');
            $respuesta->pais_residencia = $request->input('pais_residencia');
            $respuesta->comuna_residencia = $request->input('comuna_residencia');
            $respuesta->tipo_transporte = $request->input('tipo_transporte');
            $respuesta->cantidad_viajeros = $request->input('cantidad_viajeros');
            $respuesta->edad_0_12 = $request->input('edad_0_12');
            $respuesta->edad_13_25 = $request->input('edad_13_25');
            $respuesta->edad_26_40 = $request->input('edad_26_40');
            $respuesta->edad_41_60 = $request->input('edad_41_60');
            $respuesta->edad_61_80 = $request->input('edad_61_80');
            $respuesta->edad_mas_81 = $request->input('edad_mas_81');
            $respuesta->visitas_comuna = $request->input('visitas_comuna');
            $respuesta->volver_visitar = $request->input('volver_visitar');
            $respuesta->tipo_alojamiento = $request->input('tipo_alojamiento');
            $respuesta->noches_alojamiento = $request->input('noches_alojamiento');
            $respuesta->presupuesto_viaje = $request->input('presupuesto_viaje');
            $respuesta->actividades_turisticas_op1 = $actividades[0] ?? null; // Usar null si no existe
            $respuesta->actividades_turisticas_op2 = $actividades[1] ?? null;
            $respuesta->atractivos_turisticos_op1 = $atractivos[0] ?? null;
            $respuesta->atractivos_turisticos_op2 = $atractivos[1] ?? null;
            $respuesta->ecologia_panguipulli = $request->input('ecologia_panguipulli');
            $respuesta->problemas_estadia_op1 = $problemas[0] ?? null;
            $respuesta->problemas_estadia_op2 = $problemas[1] ?? null;
            $respuesta->medio_informacion = $request->input('medio_informacion');
            $respuesta->save();

            return redirect()->back()->with('success', 'Datos guardados correctamente.');
        } catch (\Exception $e) {
            \Log::error('Error al guardar datos: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al guardar los datos. Por favor, inténtalo de nuevo.');
        }
    }
}