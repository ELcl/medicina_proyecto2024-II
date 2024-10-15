<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reportes') }}
        </h2>
      </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                

                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="py-8">
                    {{-- <button data-modal-target="creaUsuario" data-modal-toggle="creaUsuario" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Nuevo
                    </button> --}}
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        

                        {{-- CANVA --}}

                <div style="display: flex; justify-content: space-around; align-items: center;">
                <!-- Gráfico de barras -->
                  <canvas id="myBarChart" style="max-width: 400px; max-height: 400px;"></canvas>

                <!-- Gráfico de torta -->
                  <canvas id="myPieChart" style="max-width: 400px; max-height: 400px;"></canvas>
                </div>

                <button id="downloadPdfBtn">Descargar PDF</button>


                



<div class="container mx-auto p-8">
    {{-- <h2 class="text-2xl font-semibold mb-6 text-center">Generar Reporte Dinámico</h2> --}}

    <!-- Formulario con múltiples listas desplegables -->
    {{-- <form id="reportForm" action="{{ route('generarReporte') }}" method="POST" class="space-y-4"> --}}
    <form id="reportForm" action="{{ route('users.index') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Primera lista desplegable -->
        <div class="flex flex-col">
            <label for="consulta1" class="mb-2 text-sm font-medium text-gray-700">MUNICIPIO: </label>
            <select id="consulta1" name="consulta1" class="block w-full bg-white border border-gray-300 rounded-lg shadow-sm p-2 focus:outline-none focus:border-indigo-500">
                <option value="ventas_mensuales">La Paz</option>
                <option value="clientes_activos">Palca</option>
                <option value="productos_mas_vendidos">Viacha</option>
                <!-- Agrega más opciones según las consultas que desees ofrecer -->
            </select>
        </div>

        <!-- Segunda lista desplegable -->
        <div class="flex flex-col">
            <label for="consulta2" class="mb-2 text-sm font-medium text-gray-700">RANGO ETAREO: </label>
            <select id="consulta2" name="consulta2" class="block w-full bg-white border border-gray-300 rounded-lg shadow-sm p-2 focus:outline-none focus:border-indigo-500">
                <option value="ventas_anuales">18-25</option>
                <option value="clientes_inactivos">26-40</option>
                <option value="productos_nuevos">41 - adelante</option>
                <!-- Agrega más opciones según las consultas que desees ofrecer -->
            </select>
        </div>

        <!-- Tercera lista desplegable -->
        <div class="flex flex-col">
            <label for="consulta3" class="mb-2 text-sm font-medium text-gray-700">CASO DE VIOLENCIA: </label>
            <select id="consulta3" name="consulta3" class="block w-full bg-white border border-gray-300 rounded-lg shadow-sm p-2 focus:outline-none focus:border-indigo-500">
                <option value="ventas_por_categoria">Fisica</option>
                <option value="clientes_nuevos">Laboral</option>
                <option value="productos_menos_vendidos">Psicológica</option>
                <!-- Agrega más opciones según las consultas que desees ofrecer -->
            </select>
        </div>

        <!-- Botón para generar el reporte -->
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4">
            Generar Reporte
        </button>
    </form>

    <!-- Aquí se mostrará el reporte generado dinámicamente -->
    <div id="reportResult" class="mt-8 p-4 border border-gray-200 rounded-lg bg-gray-50"></div>

    <!-- Botón para exportar a PDF (oculto por defecto) -->
    <button id="exportPdfBtn" class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-4" style="display: none;">
        Exportar a PDF
    </button>
</div>



                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


                
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>

                // Datos pasados desde el controlador Laravel
                const chartData = @json($data);
                // Gráfico de barras
                const barCtx = document.getElementById('myBarChart');
                
                new Chart(barCtx, {
                  type: 'bar',
                  data: {
                    /*labels: ['Viacha', 'Palca', 'Jupapina', 'Apolo', 'Alto Beni', 'Batallas'],*/
                    labels: chartData.labels,
                    datasets: [{
                      label: '# Casos de Violencia',
                      /*data: [12, 19, 3, 5, 2, 3],*/
                      data: chartData.values,
                      borderWidth: 1,
                      backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                      ],
                    }]
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                });

                // Gráfico de torta
                const pieCtx = document.getElementById('myPieChart');
                
                new Chart(pieCtx, {
                  type: 'pie',
                  data: {
                    /*labels: ['Viacha', 'Palca', 'Jupapina', 'Apolo', 'Alto Beni', 'Batallas'],*/
                    labels: chartData.labels,
                    datasets: [{
                      label: 'Votes',
                      data: [12, 19, 3, 5, 2, 3],
                      backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    responsive: true,
                    maintainAspectRatio: false, 
                    plugins: {
                      legend: {
                        position: 'top',
                      },
                      tooltip: {
                        callbacks: {
                          label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                          }
                        }
                      }
                    }
                  }
                });

                // Función para capturar los gráficos y generar PDF con título y escalado adecuado
  document.getElementById('downloadPdfBtn').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({
      orientation: 'portrait',  // Modo vertical
      unit: 'mm',               // Unidades en milímetros
      format: 'letter'          // Tamaño carta
    });

    // Añadir título centrado
    doc.setFontSize(18);
    doc.text("Reporte de Casos de Violencia", doc.internal.pageSize.getWidth() / 2, 20, { align: "center" });
    doc.text("Reporte de Casos de Violencia #2", doc.internal.pageSize.getWidth() / 2, 150, { align: "center" });

    // Capturar el gráfico de barras como imagen
    html2canvas(barCtx).then(function(canvas) {
      const barChartImg = canvas.toDataURL('image/png');
      doc.addImage(barChartImg, 'PNG', 50, 40, 100, 80);  // Añadir imagen al PDF con escalado

      // Capturar el gráfico de torta como imagen
      html2canvas(pieCtx).then(function(canvas) {
        const pieChartImg = canvas.toDataURL('image/png');
        doc.addImage(pieChartImg, 'PNG', 50, 170, 100, 90);  // Añadir segunda imagen al PDF con escalado

        // Descargar el PDF
        doc.save('reporte_graficos.pdf');
                    });
                  });
                });


              </script>

            </div>
        </div>
    </div>
</x-app-layout>
