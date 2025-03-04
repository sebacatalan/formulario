<?php

namespace App\Http\Controllers;

class GraficasController extends Controller
{
    public function mostrarGrafica()
    {
        // Datos de ejemplo para el gráfico de torta
        $datosTorta = [
            ['motivo_visita' => 'Turismo', 'total' => 33],
            ['motivo_visita' => 'Negocios', 'total' => 19],
            ['motivo_visita' => 'Visita Familiar', 'total' => 25],
            ['motivo_visita' => 'Eventos', 'total' => 14],
            ['motivo_visita' => 'Otros', 'total' => 8],
        ];

        // Pasar los datos a la vista como JSON
        return view('grafica', [
            'datosTorta' => json_encode($datosTorta),
        ]);
    }
}