<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Support\Facades\Response;
use League\Csv\Writer;

class ExportController extends Controller
{
    public function descargarCSV()
    {
        $registros = Respuesta::all();
        $nombre_archivo = "datos_turismo.csv";

        // Crear un objeto CSV en memoria
        $csv = Writer::createFromString('');
        
        // Configurar el CSV para usar UTF-8
        $csv->setOutputBOM(Writer::BOM_UTF8);
        
        // Agregar encabezados
        $csv->insertOne([
            "Nombre Oficina",
            "Fecha",
            "Hora",
            "Motivo Consulta",
            "Motivo Consulta Especifico",
            "Motivo Viaje",
            "Vía Acceso",
            "País Residencia",
            "Comuna Residencia",
            "Tipo Transporte",
            "Cantidad Viajeros",
            "Edad 0-12",
            "Edad 13-25",
            "Edad 26-40",
            "Edad 41-60",
            "Edad 61-80",
            "Edad +81",
            "Visitas Comuna",
            "Volver Visitar",
            "Tipo Alojamiento",
            "Noches Alojamiento",
            "Presupuesto Viaje",
            "Actividades Turísticas Opción 1",
            "Actividades Turísticas Opción 2",
            "Atractivos Turísticos Opción 1",
            "Atractivos Turísticos Opción 2",
            "Ecología Panguipulli",
            "Problemas Estadía Opción 1",
            "Problemas Estadía Opción 2",
            "Visitas Comuna Total",
            "Medio Información",
        ]);

        // Agregar datos desde la base de datos
        foreach ($registros as $registro) {
            $csv->insertOne([
                $registro->nombre,
                $registro->fecha,
                $registro->hora,
                $registro->motivo_consulta,
                $registro->motivo_consulta_especifico,
                $registro->motivo_viaje,
                $registro->via_acceso,
                $registro->pais_residencia,
                $registro->comuna_residencia,
                $registro->tipo_transporte,
                $registro->cantidad_viajeros,
                $registro->edad_0_12,
                $registro->edad_13_25,
                $registro->edad_26_40,
                $registro->edad_41_60,
                $registro->edad_61_80,
                $registro->edad_mas_81,
                $registro->visitas_comuna,
                $registro->volver_visitar,
                $registro->tipo_alojamiento,
                $registro->noches_alojamiento,
                $registro->presupuesto_viaje,
                $registro->actividades_turisticas_op1,
                $registro->actividades_turisticas_op2,
                $registro->atractivos_turisticos_op1,
                $registro->atractivos_turisticos_op2,
                $registro->ecologia_panguipulli,
                $registro->problemas_estadia_op1,
                $registro->problemas_estadia_op2,
                $registro->visitas_comuna_total,
                $registro->medio_informacion,
            ]);
        }

        // Obtener el contenido del CSV como string
        $csv_content = $csv->toString();
        
        // Descargar el archivo CSV
        return Response::make($csv_content, 200, [
            "Content-Type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=\"" . $nombre_archivo . "\"",
            "Content-Length" => strlen($csv_content),
        ]);
    }
}