<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha',
        'hora',
        'motivo_consulta',
        'motivo_consulta_especifico',
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
        'medio_informacion',
    ];
}