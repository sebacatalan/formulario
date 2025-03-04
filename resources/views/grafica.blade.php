@extends('layouts.app')

@section('title', 'Gráficas de Datos')

@section('content')
    <h1>Gráficas de Datos</h1>
    <style>
        .graficos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }

        .nombre-grafico {
            text-align: center;
        }

        .custom-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
            font-size: 14px;
            justify-content: center;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .legend-color {
            width: 15px;
            height: 15px;
            display: inline-block;
            border-radius: 3px;
        }
    </style>
    
    <div class="graficos-grid">
        <div class="grafico-item">
            <h2 class="nombre-grafico">Gráfico 1</h2>
            <canvas id="graficoTorta1"></canvas>
            <div id="legend-container-1"></div>
        </div>
        <div class="grafico-item">
            <h2 class="nombre-grafico">Gráfico 2</h2>
            <canvas id="graficoTorta2"></canvas>
            <div id="legend-container-2"></div>
        </div>
        <div class="grafico-item">
            <h2 class="nombre-grafico">Gráfico 3</h2>
            <canvas id="graficoTorta3"></canvas>
            <div id="legend-container-3"></div>
        </div>
        <div class="grafico-item">
            <h2 class="nombre-grafico">Gráfico 4</h2>
            <canvas id="graficoTorta4"></canvas>
            <div id="legend-container-4"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Chart.register(ChartDataLabels);

            // Datos para cada gráfico (Se pueden personalizar según tu lógica)
            const datosTorta = @json(json_decode($datosTorta));

            const colores = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];
            const nombresGraficos = ["Gráfico 1", "Gráfico 2", "Gráfico 3", "Gráfico 4"];

            function generarGrafico(idCanvas, idLeyenda, datos, titulo) {
                const labels = datos.map(dato => dato.motivo_visita);
                const data = datos.map(dato => dato.total);

                const config = {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: titulo,
                            data: data,
                            backgroundColor: colores,
                            borderColor: '#ffffff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            datalabels: {
                                color: '#000',
                                font: {
                                    weight: 'bold'
                                },
                                formatter: (value) => value,
                                anchor: 'center',
                                align: 'center'
                            },
                            legend: {
                                display: false
                            }
                        }
                    }
                };

                const ctx = document.getElementById(idCanvas).getContext('2d');
                new Chart(ctx, config);

                // Generar la leyenda personalizada
                const legendContainer = document.getElementById(idLeyenda);
                let legendHTML = '<div class="custom-legend">';

                labels.forEach((label, index) => {
                    legendHTML += `
                        <div class="legend-item">
                            <span class="legend-color" style="background-color: ${colores[index]}"></span>
                            <span>${label}: ${data[index]}</span>
                        </div>
                    `;
                });

                legendHTML += '</div>';
                legendContainer.innerHTML = legendHTML;
            }

            // Generar los 4 gráficos
            generarGrafico("graficoTorta1", "legend-container-1", datosTorta, "Motivos de Visita 1");
            generarGrafico("graficoTorta2", "legend-container-2", datosTorta, "Motivos de Visita 2");
            generarGrafico("graficoTorta3", "legend-container-3", datosTorta, "Motivos de Visita 3");
            generarGrafico("graficoTorta4", "legend-container-4", datosTorta, "Motivos de Visita 4");
        });
    </script>
@endsection