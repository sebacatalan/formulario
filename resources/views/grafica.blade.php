@extends('layouts.app')

@section('title', 'Gráficas de Datos')

@section('content')
    <h1>Gráficas de Datos</h1>
    <style>
        .graficos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .grafico-item {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }

        .nombre-grafico {
            text-align: center;
            margin-bottom: 15px;
        }

        .custom-legend {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border-radius: 50%;
        }
    </style>

    <div class="graficos-grid">
        @foreach (array_keys($datosGraficas) as $columna)
            <div class="grafico-item">
                <h2 class="nombre-grafico">{{ str_replace('_', ' ', ucfirst($columna)) }}</h2>
                <canvas id="grafico_{{ $columna }}"></canvas>
                <div id="legend_{{ $columna }}" class="custom-legend"></div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Registrar el plugin datalabels
            Chart.register(ChartDataLabels);

            @foreach (array_keys($datosGraficas) as $columna)
                const datos_{{ $columna }} = @json(json_decode($datosGraficas[$columna]));

                // Filtrar valores null antes de procesarlos
                const datosFiltrados_{{ $columna }} = datos_{{ $columna }}.filter(dato => dato['{{ $columna }}'] !== null && dato.total !== null);

                const labels_{{ $columna }} = datosFiltrados_{{ $columna }}.map(dato => dato['{{ $columna }}']);
                const data_{{ $columna }} = datosFiltrados_{{ $columna }}.map(dato => dato.total);

                // Calcular el total de registros
                const totalRegistros_{{ $columna }} = data_{{ $columna }}.reduce((acc, val) => acc + val, 0);

                // Actualizar el título del gráfico
                const tituloElement_{{ $columna }} = document.querySelector('#grafico_{{ $columna }}').closest('.grafico-item').querySelector('.nombre-grafico');
                tituloElement_{{ $columna }}.innerHTML = `{{ str_replace('_', ' ', ucfirst($columna)) }} <span style="font-size: 0.8em; color: #666;">(Total: ${totalRegistros_{{ $columna }}})</span>`;

                const colores_{{ $columna }} = [
                    '#FFC300', '#36A2EB', '#4CAF50', '#9C27B0', '#FF9800',
                    '#00BCD4', '#E91E63', '#607D8B', '#795548', '#009688', '#FFEB3B'
                ];

                let chartType_{{ $columna }} = ['cantidad_viajeros', 'edad_0_12', 'edad_13_25', 'edad_26_40', 'edad_41_60', 'edad_61_80', 'edad_mas_81', 'noches_alojamiento', 'ecologia_panguipulli'].includes('{{ $columna }}') ? 'bar' : 'pie';

                const ctx_{{ $columna }} = document.getElementById('grafico_{{ $columna }}').getContext('2d');
                const grafico_{{ $columna }} = new Chart(ctx_{{ $columna }}, {
                    type: chartType_{{ $columna }},
                    data: {
                        labels: labels_{{ $columna }},
                        datasets: [{
                            label: '{{ str_replace('_', ' ', ucfirst($columna)) }}',
                            data: data_{{ $columna }},
                            backgroundColor: colores_{{ $columna }},
                            borderColor: '#fff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: false },
                            title: { display: false },
                            datalabels: {
                                formatter: (value, ctx) => {
                                    const dataset = ctx.chart.data.datasets[0];
                                    const sum = dataset.data.reduce((acc, data) => acc + data, 0);
                                    const percentage = Math.round((value / sum) * 100) + '%';
                                    return percentage;
                                },
                                color: '#fff',
                                font: { weight: 'bold', size: 12 },
                                display: function (context) {
                                    const dataset = context.chart.data.datasets[0];
                                    const total = dataset.data.reduce((acc, data) => acc + data, 0);
                                    const value = dataset.data[context.dataIndex];
                                    return value / total > 0.03;
                                }
                            }
                        },
                        scales: {
                            y: { beginAtZero: true, display: chartType_{{ $columna }} === 'bar' }
                        }
                    }
                });

                // Generar leyenda personalizada
                const legendContainer_{{ $columna }} = document.getElementById('legend_{{ $columna }}');
                let legendHTML_{{ $columna }} = '';
                labels_{{ $columna }}.forEach((label, index) => {
                    legendHTML_{{ $columna }} += `
                            <div class="legend-item">
                                <span class="legend-color" style="background-color: ${colores_{{ $columna }}[index]}"></span>
                                <span>${label}: ${data_{{ $columna }}[index]}</span>
                            </div>
                        `;
                });
                legendContainer_{{ $columna }}.innerHTML = legendHTML_{{ $columna }};
            @endforeach
        });
    </script>
@endsection