// Se implementa ajax para acutalizar los gráficos de admin

function dibujarGrafico(labels, datos_meses, grafica_a_dibujar, backgroungColor, borderColor, cabecera) {
    // Configuración de datos para el gráfico
    var ctx = document.getElementById(grafica_a_dibujar).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: cabecera,
                data: datos_meses,
                backgroundColor: backgroungColor,
                borderColor: borderColor,
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false, // Desactiva el ajuste automático del aspecto
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Meses'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Ventas'
                    }
                },
            }
        }
    });
}

// ...

function obtenerVentasMensuales() {
    var timer;

    const url = '/panaderia/graphics/ganancias-totales/scripts.ajax-db.meses/consulta-ganancia-meses.php';

    const data = {};

    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    fetch(url, requestOptions)
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            console.log(data);

            // Llama a la función para dibujar el gráfico con los nuevos datos
            dibujarGrafico(data.labels_meses, data.datos_meses, 'ventas_meses', 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 1)', 'Ventas menusales');
        })
        .catch(error => {
            console.error('Error en la solicitud AJAX:', error);
        });
}

// Llama a la función cuando desees obtener las ventas mensuales
obtenerVentasMensuales();
timer = setInterval(obtenerVentasMensuales, 5000);

function obtenerVentasDiarias() {
    var timer;

    const url = '/panaderia/graphics/ganancias-totales/scripts.ajax-db.dia/consulta-ganancia-dia.php';

    const data = {};

    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    fetch(url, requestOptions)
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            console.log(data);

            // Llama a la función para dibujar el gráfico con los nuevos datos
            dibujarGrafico(data.labels_dias, data.datos_dias, 'ventas_dias', 'rgba(180, 0, 212, 0.2)', 'rgba(144, 0, 170, 1)', 'Venta semanal');
        })
        .catch(error => {
            console.error('Error en la solicitud AJAX:', error);
        });
}

obtenerVentasDiarias();
timer = setInterval(obtenerVentasDiarias, 5000);

function obtenerVentaTotal() {
    var timer;

    const url = '/panaderia/graphics/ganancias-totales/scripts.ajax-db.totales/consulta-ganancia-totales.php';

    const data = {};

    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    fetch(url, requestOptions)
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            console.log(data);

            var card3 = document.getElementById('card3');
            card3.innerHTML = `
            <div class="h-100 card position-relative bg-transparent responsive-totales">
                <div class="card-body p-0">
                    <div class="w-100 card-title position-absolute m-0 p-3 h4 border-bottom border-light">Ganancias totales</div>
                    <div class="card-text w-100 h-100 d-flex mt-2 justify-content-center align-items-center fs-2 text-white">
                        <span class="text-success me-2">$</span> ${data.ventasTotales}
                    </div>
                </div>
            </div>
            `;
        })
        .catch(error => {
            console.error('Error en la solicitud AJAX:', error);
        });

}
obtenerVentaTotal();
timer = setInterval(obtenerVentaTotal, 5000);

function obtenerVentasRecientes() {
    var timer;

    const url = '/panaderia/graphics/ganancias-totales/scripts.ajax-db.ventas-recientes/consulta-ventas-recientes.php';

    const data = {};

    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    fetch(url, requestOptions)
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            function obtenerVentasRecientes() {
                var timer;

                const url = '/panaderia/graphics/ganancias-totales/scripts.ajax-db.ventas-recientes/consulta-ventas-recientes.php';

                const data = {};

                const requestOptions = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                };

                fetch(url, requestOptions)
                    .then(response => response.json())
                    .then(data => {
                        // Manipula los datos recibidos aquí
                        const ventasRecientes = document.getElementById('ventas_recientes');

                        // Utiliza map en lugar de forEach para crear un array de elementos li
                        const elementosLi = data.map(venta => {
                            return `
                                    <li class="timeline-item mb-5">
                                        <span class="timeline-icon">
                                            <i class="fas fa-rocket fa-sm fa-fw"></i>
                                        </span>
                                        <h5 class="text-white m-0 fw-bold">Venta realizada</h5>
                                        <p class="text-white m-0 fw-bold">${venta.nombre}</p>
                                        <p class="text-success">${venta.fecha}</p>
                                    </li>
                                    `;
                        });

                        // Convierte el array de elementos li en una cadena y asigna al innerHTML
                        ventasRecientes.innerHTML = elementosLi.join('');
                    })
                    .catch(error => {
                        console.error('Error en la solicitud AJAX:', error);
                    });
            }

            obtenerVentasRecientes();
        })
        .catch(error => {
            console.error('Error en la solicitud AJAX:', error);
        });
}

obtenerVentasRecientes();
timer = setInterval(obtenerVentasRecientes, 5000);