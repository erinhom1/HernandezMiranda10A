@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
    <h1 class="mt-4">Estadisticas</h1>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="{{ asset('js/chartjs-adapter-date.min.js') }}"></script>
@stop

@section('content')
<div class="row">
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" id="date-selector" class="form-control" placeholder="Seleccionar fecha">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fa fa-calendar"></i>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <h1>salidas por dia </h1>
        <canvas id="chart1" style="width: 100%; height: 200px;"></canvas>
        <h1>salidas de Octubre vs Noviembre</h1>
        <canvas id="chart2" style="width: 100%; height: 200px;"></canvas>
    </div>
    <div class="col-md-3">
    <h1>salidas por hora </h1>
        <canvas id="chart3" style="width: 100%; height: 200px;"></canvas>
    <h1>Marcas de carros que mas salieron </h1>
        <canvas id="chart4" style="width: 100%; height: 200px;"></canvas>
    </div>
</div>





    <script>



var chart1, chart2, chart3, chart4;

flatpickr("#date-selector", {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    defaultDate: "2023-01-01",
    onChange: function (selectedDates) {
        const selectedDate = selectedDates[0];

        // Update charts based on the selected date
        updateCharts(selectedDate);
    }
});

function updateCharts(selectedDate) {
    console.log('Selected Date:', selectedDate);

    // Convert the selected date to the format 'Y-m-d'
    const convertedDate = selectedDate.toISOString().split('T')[0];

    // Make an Ajax request to fetch data based on the selected date
    $.ajax({
        url: '/dashboard/stats',  // Update the URL to match your Laravel route
        method: 'GET',
        data: { date: convertedDate },
        success: function (data) {
            console.log('Data retrieved:', data);
            // Update your charts with the retrieved data
            // ...
        },
        error: function (xhr, status, error) {
            console.error('Error retrieving data:', xhr);
        }
    });
}





        var chart1Data = {
            labels: {!! json_encode($chart1Data->pluck('date')) !!},
            datasets: [{
                label: "Salidas por dia",
                data: {!! json_encode($chart1Data->pluck('count')) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var data2 = {
        labels: ["Noviembre", "Octubre"],
        datasets: [{
            label: "Salidas del Mes",
            data: {!! json_encode($chart2Data->pluck('count')) !!},
            backgroundColor: ["orange", "purple"],
        }]
    };

   // Extract 'hour' and 'count' directly from the data
var chart3Data = {!! json_encode($chart3Data) !!};
    // Format the data for scatter plot
var scatterData = chart3Data.map(item => ({ x: item.hour, y: item.count, label: `Hora: ${item.hour}, Total: ${item.count}` }));
    // Get the canvas element
var uniqueHours = [...new Set(scatterData.map(item => item.x))];

    var data3 = {
        labels: {!! json_encode($chart3Data->pluck('hour')) !!},
        datasets: [{
            label: "Salidas por hora",
            data: {!! json_encode($chart3Data->pluck('count')) !!},
            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Use your desired color
            borderColor: 'rgba(255, 99, 132, 1)', // Use your desired color
            borderWidth: 1
        }]
    };

    var chart4Data = {!! json_encode($chart4Data) !!};

    var labels = chart4Data.map(function(item) {
    return item.Nombre;
    });


    var data4 = {
    labels: labels,
    datasets: [{
        label: "Salidas por Marca",
        data: {!! json_encode($chart4Data->pluck('count')) !!},
        backgroundColor: [
            'rgba(255, 99, 132, 0.7)', // Red
            'rgba(54, 162, 235, 0.7)', // Blue
            'rgba(255, 206, 86, 0.7)', // Yellow
            'rgba(75, 192, 192, 0.7)', // Teal
            'rgba(153, 102, 255, 0.7)', // Purple
            'rgba(255, 159, 64, 0.7)', // Orange
            'rgba(0, 128, 0, 0.7)',    // Green
            // Add more colors as needed
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)', // Red
            'rgba(54, 162, 235, 1)', // Blue
            'rgba(255, 206, 86, 1)', // Yellow
            'rgba(75, 192, 192, 1)', // Teal
            'rgba(153, 102, 255, 1)', // Purple
            'rgba(255, 159, 64, 1)', // Orange
            'rgba(0, 128, 0, 1)',    // Green
            // Add more colors as needed
        ],
        borderWidth: 3,
    }]
};


    // Get the canvas elements
    var ctx1 = document.getElementById('chart1').getContext('2d');
    var ctx2 = document.getElementById('chart2').getContext('2d');
    var ctx3 = document.getElementById('chart3').getContext('2d');
    var ctx4 = document.getElementById('chart4').getContext('2d');

    
 

   


    // Create the charts
    chart1 = new Chart(ctx1, {
            type: 'bar',
            data: chart1Data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        stepSize: 1,
                        max: 10,
                        precision: 0,
                    },
                    x: {
                        type: 'category',
                    }
                },
                // Add other chart options here
            }
        });


        var chart2 = new Chart(ctx2, {
        type: 'pie',
        data: data2,
        options: {
            // Add other chart options here
        }
    });

    var chart3 = new Chart(ctx3, {
        type: 'scatter',
        data: {
            datasets: [{
                data: scatterData,
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                pointRadius: 10,
            }],
        },
        options: {
            scales: {
                x: {
                    type: 'category',
                    position: 'bottom',
                    min: Math.min(...scatterData.map(item => item.x)),
                    max: Math.max(...scatterData.map(item => item.x)),
                    labels: uniqueHours,
                },
                y: {
                    type: 'linear',
                    position: 'bottom',
                    min: Math.min(...scatterData.map(item => item.y)),
                    max: Math.max(...scatterData.map(item => item.y)),
                    display: true,
                    max: 12,
                    min: 0,
                    precision: 0,
                },
            },
            plugins: {
                tooltip: {
                    enabled: true,
                    callbacks: {
                        title: function () {
                            return 'Salidas por hora';
                        },
                        label: function (context) {
                            return context.dataset.data[context.dataIndex].label;
                        },
                    },
                },
            },
            // Add other chart options here
        }
    });

    var chart4 = new Chart(ctx4, {
    type: 'pie',
    data: data4,
    options: {
        // Add other chart options here
    }
});

</script>

@stop
