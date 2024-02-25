function drawChart() {
    // call ajax function to get sports data
    var jsonData = $.ajax({
        url: "/panaderia/graphics/ganancias-totales/ganancias-totales.php",
        dataType: "json",
        async: false
    }).responseText;
    console.log(jsonData);
    // Convertir la cadena JSON en un objeto JavaScript
    var jsonDataObject = JSON.parse(jsonData);

    // Crear un DataTable y agregar columnas
    var data = new google.visualization.DataTable();
    data.addColumn('string', jsonDataObject[0][0]); // Columna 'Date'
    data.addColumn('number', jsonDataObject[0][1]); // Columna 'Sales'

    // Agregar filas al DataTable
    for (var i = 1; i < jsonDataObject.length; i++) {
        data.addRow(jsonDataObject[i]);
    }

    // Configurar opciones del gráfico
    var options = {
        title: 'Company Performance',
        hAxis: {title: 'Year', titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0},
        chartArea: {width: '50%', height: '70%'},
        
    };

    // Crear el gráfico y dibujarlo en el elemento con el ID 'chart_container'
    var chart = new google.visualization.AreaChart(document.getElementById('chart_container'));
    chart.draw(data, options);
}
// load the visualization api
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);