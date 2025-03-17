<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Support\Facades\DB;

class GraficasController extends Controller
{
    public function mostrarGrafica()
    {
        $columnas = [
            'motivo_consulta',
            'motivo_viaje',
            'via_acceso',
            'pais_residencia',
            'comuna_residencia',
            'tipo_transporte',
            'cantidad_viajeros',
            'edad_0_12',
            'edad_13_25',
            'edad_26_40',
            'edad_41_60',
            'edad_61_80',
            'edad_mas_81',
            'visitas_comuna',
            'volver_visitar',
            'tipo_alojamiento',
            'noches_alojamiento',
            'presupuesto_viaje',
            'actividades_turisticas_op1',
            'actividades_turisticas_op2',
            'atractivos_turisticos_op1',
            'atractivos_turisticos_op2',
            'ecologia_panguipulli',
            'problemas_estadia_op1',
            'problemas_estadia_op2',
            'medio_informacion'
        ];

        $datosGraficas = [];

        foreach ($columnas as $columna) {
            $datos = Respuesta::select($columna, DB::raw('count(*) as total'))
                ->groupBy($columna)
                ->get()
                ->toArray();

            $datosGraficas[$columna] = json_encode($datos);
        }

        return view('grafica', ['datosGraficas' => $datosGraficas]);
    }

    public function mostrarSubGraficas()
    {
        $datosSubGraficas = [];

        // Obtener datos para cada categoría
        $categorias = [
            'actividades_aventura' => 'Actividades de turismo aventura',
            'areas_silvestres_protegidas' => 'Áreas Silvestres Protegidas por el Estado',
            'parques_reservas_privadas' => 'Parques y Reservas Privadas',
            'cultura_patrimonio' => 'Cultura y patrimonio',
            'eventos_actividades_recreativas' => 'Eventos y actividades recreativas',
            'transporte_accesibilidad' => 'Transporte y accesibilidad',
            'pesca_recreativa' => 'Pesca recreativa',
            'servicios_infraestructura' => 'Servicios e infraestructura',
        ];

        foreach ($categorias as $columna => $nombre) {
            $datos = Respuesta::select('motivo_consulta_especifico', DB::raw('count(*) as total'))
                ->where('motivo_consulta', $nombre)
                ->groupBy('motivo_consulta_especifico')
                ->get()
                ->toArray();

            $datosSubGraficas[$columna] = json_encode($datos);
        }

        return view('subgrafica', ['datosSubGraficas' => $datosSubGraficas]);
    }
}