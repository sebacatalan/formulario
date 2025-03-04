<?php

namespace App\Http\Livewire;


use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;

class PieChartComponent extends Component
{
    public function render()
    {
        $datosTorta = [
            ['motivo_visita' => 'Turismo', 'total' => 33],
            ['motivo_visita' => 'Negocios', 'total' => 19],
            ['motivo_visita' => 'Visita Familiar', 'total' => 25],
            ['motivo_visita' => 'Eventos', 'total' => 14],
            ['motivo_visita' => 'Otros', 'total' => 8],
        ];

        $pieChartModel = (new PieChartModel())
            ->setTitle('Motivos de Visita')
            ->setDataLabelsEnabled(true) // Habilita los data labels en el gráfico
            ->legendPositionBottom() // Opcional: Leyenda abajo
            ->withOnSliceClickEvent('onSliceClick')
            ->addSlice('Turismo', 33, '#f6ad55')
            ->addSlice('Negocios', 19, '#fc8181')
            ->addSlice('Visita Familiar', 25, '#90cdf4')
            ->addSlice('Eventos', 14, '#68d391')
            ->addSlice('Otros', 8, '#d6bcfa');

        return view('livewire.pie-chart-component')
            ->with([
                'pieChartModel' => $pieChartModel,
            ]);
    }
}