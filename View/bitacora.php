<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitacora</title>

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="http://code.highcharts.com/stock/highstock.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/bitacora.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="../css/navi2.css?v=<?php echo (rand()); ?>">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="icon" href="../img/iconos/favicon.jpg" />
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/plotly-latest.min.js"></script>
    <script src="../js/plotly-locale-es.js"></script>
    <script>
    Plotly.setPlotConfig({
        locale: 'es'
    })
    </script>
</head>
<?php
error_reporting(E_ERROR);
require("../Model/sessiones.php");
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location: http://localhost/SGIRPC_US_dev_2022/index.php");
}

require("../Model/Conexion.php");
require("../Model/Consultas.php");

?>

<body id="fondo" background="../img/fondo_p2.jpg">

    <?php

    //Recorro las fechas y con la función strotime obtengo los lunes
    for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
        //Sacar el dia de la semana con el modificador N de la funcion date
        $dia = date('N', $i);
        if ($dia == 1) {
            echo "Lunes. " . date("Y-m-d", $i) . "<br>";
        }
    }
    ?>
  
        
        <div id="dia_actual">
        <div id=panel_b> 
            <div class="container-fluid">
                <!-- <div class="row">
                    <div class="col-4">
                        <h3>Panel de control - Bitacora</h3>
                    </div>
                    <div class="col-4"></div>
                    <div  class="col-4 justify-content-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Generar Reportes
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="../Controller/getCsvDir.php">CSV Turnos Direcciones General</a></li>
                            <li><a class="dropdown-item" href="../Controller/getCsvT.php">CSV Turnos Titular de la Secretaria</a></li>
                     
                        </ul>
                    </div>
                    </div>
                </div> -->
            </div>
           
           
        </div>
            <div id="graficas">

                <div id="graph_1"></div>
                <div id="graph_2"></div>
                <div id="grafica_barras">
                <div id="graph_b"></div>
                </div>
            <div id="grafica_usr">
                <div id="graph_c"></div>
            </div>
            </div>
            
            
        </div>
    
    
</body>

</html>

<?php


?>

<script>
function ObtenerJson(json) {
    //json = JSON.stringify(json)
    var parsed = JSON.parse(json, 0, 1, 2);
    var arr = [];
    for (var x in parsed) {
        arr.push(parsed[x]);
    }
    return arr;
    //console.log(arr);
}


function get_data_paint() {
    let active = 1
    $.ajax({
        type: 'POST',
        url: '../Controller/gen_data_graphs.php',
        data: {
            'active': active
        },
        success: function(res) {
            //console.log(res);
           // console.log(JSON.stringify(res[1]));
            /*datosX = crearCadenaLineal(json);
            datosY = crearCadenaLineal(r);
            datosY2 = crearCadenaLineal(f);
            */
            data = ObtenerJson(res);
            datosX = data[0];
            datosY = data[1];
            datosY2 = data[2];
            datosY_trace3 = data[3];
            datosY_trace4 = data[4];
            //console.log(datosX)
            //console.log(data);
            //console.log(datosY);
            //console.log(data[0]);
            //datosY = crearCadenaLineal(res2);
            var trace1 = {
                x: datosX,
                y: datosY,
                type: 'scatter',
                line: {
                    color: '#1a92f0'
                },
                marker: {
                    color: "DarkSlateGrey",
                    size: 20
                },
                name: 'Documentos registrados'

            };

            var trace2 = {
                x: datosX,
                y: datosY2,
                type: 'scatter',
                line: {
                    color: '#f0981a'
                },
                name: 'Documentos turnados'
            };

            var trace3 = {
                x: datosX,
                y: datosY_trace3,
                type: 'scatter',
                line: {
                    color: '#34f01a'
                },
                name: 'Documentos atendidos'
            };
            var trace4 = {
                x: datosX,
                y: datosY_trace4,
                type: 'scatter',
                line: {
                    color: '#e04914'
                },
                name: 'Documentos con fecha limite vencida'
            };


            var data = [trace1, trace2, trace3, trace4];


            var layout = {
                title: 'Documentos Registrados / Documentos Turnados',
                showlegend: true
            };




            Plotly.newPlot('graph_1', data, layout, {
                displayModeBar: false
            }, {
                locale: 'es'
            });

        },
    });
}

function get_data_paint2(){
    let active = 1;
    $.ajax({
        type: 'POST',
        url: '../Controller/gen_data_graphs_b.php',
        data: {
            'active': active
        },
        success: function(res) {
            console.log(res);
            //console.log(JSON.stringify(res[1]));
            /*datosX = crearCadenaLineal(json);
            datosY = crearCadenaLineal(r);
            datosY2 = crearCadenaLineal(f);
            */
            
            data = ObtenerJson(res);
            datosX = data[0];
            datosY = data[1];
            datosY3 = data[2];
            console.log(data[0]);
            var trace1 = {
                x: datosX,
                y: datosY,
                marker:{
                    color: 'rgb(139, 139, 139)',
                },
                type: 'bar',
                name: 'Documentos turnados a direcciones'

            };

            var trace2 = {
                x: datosX,
                y: [0,0,0,0,0,0,0,0,0],
                marker:{
                    color: 'rgb( 83, 194, 98 )',
                },
                type: 'bar',
                name: 'Documentos atendidos por direccion'

            };

            
            var trace3 = {
                x: datosX,
                y: datosY3,
                marker:{
                    color: 'rgb(  200, 47, 47  )',
                },
                type: 'bar',
                name: 'Documentos con fecha limite vencida por direccion'

            };


           


            var data = [trace1,trace2,trace3];


            var layout = {
                title: 'Direcciones',
                showlegend: true
            };




            Plotly.newPlot('graph_b', data, layout, {
                displayModeBar: false
            }, {
                locale: 'es'
            });

        },
    });
}

function get_data_paint3(){
    let active = 1;
    $.ajax({
        type: 'POST',
        url: '../Controller/gen_data_graphs_c.php',
        data: {
            'active': active
        },
        success: function(res) {
            console.log(res);
            //console.log(JSON.stringify(res[1]));
            /*datosX = crearCadenaLineal(json);
            datosY = crearCadenaLineal(r);
            datosY2 = crearCadenaLineal(f);
            */
            data = ObtenerJson(res);
            datosX = data[0];
            datosY = data[1];
            datosY2 = data[2];
            console.log(data[0]);
            var trace1 = {
                x: datosX,
                y: datosY,
                type: 'bar',
                name: 'Documentos registrados'
               

            };
            var trace2 = {
                x: datosX,
                y: datosY2,
                type: 'bar',
                name: 'Documentos turnados'

            };

           


            var data = [trace1,trace2];


            var layout = {
                title: 'Documentos / Usuarios',
                showlegend: true
            };




            Plotly.newPlot('graph_c', data, layout, {
                displayModeBar: false
            }, {
                locale: 'es'
            });

        },
    });
}


G1 = document.getElementById('graph_1');
G2 = document.getElementById('graph_b');
G3 = document.getElementById('graph_c');
var datosX = "";
$(document).ready(function() {
    get_data_paint();
    get_data_paint2();
    get_data_paint3();

    setInterval(() => {

        let active = 1
        $.ajax({
            type: 'POST',
            url: '../Controller/gen_data_graphs.php',
            data: {
                'active': active
            },
            success: function(res) {
                // console.log(res);
                //console.log(JSON.stringify(res[1]));
                /*datosX = crearCadenaLineal(json);
                datosY = crearCadenaLineal(r);
                datosY2 = crearCadenaLineal(f);
                */
                data = ObtenerJson(res);
                datosX = data[0];
                datosY = data[1];
                datosY2 = data[2];
                datosY_trace3 = data[3];
                datosY_trace4 = data[4];
                //console.log(datosX)
                //console.log(data);
                //console.log(datosY);
                //console.log(data[0]);
                //datosY = crearCadenaLineal(res2);
                var trace1 = {
                    x: datosX,
                    y: datosY,
                    type: 'scatter',
                    line: {
                        color: '#34f01a'
                    },
                    name: 'dsaDocumentos registrados'

                };

                var trace4 = {
                    x: datosX,
                    y: datosY2,
                    type: 'scatter',
                    line: {
                        color: '#f0981a'
                    },
                    name: 'xvcDocumentos turnados'
                };
                var trace5 = {
                    x: datosX,
                    y: datosY_trace3,
                    type: 'scatter',
                    line: {
                        color: '#34f01a'
                    },
                    name: 'Documentos atendidos'
                };
                var trace6 = {
                    x: datosX,
                    y: datosY_trace4,
                    type: 'scatter',
                    line: {
                        color: '#e04914'
                    },
                    name: 'Documentos desfasados'
                };


                let update = null;
                datosX22 = JSON.stringify(datosX);
                datosY33 = JSON.stringify(datosY);
                //console.log(datosX22);
                //console.log(datosY33);
                datosY5 = datosY.toString().replace(/['"]+/g, '');

                update = {
                    'x': [
                        datosX
                    ],
                    'y': [
                        datosY
                    ],
                };
                update2 = {
                    'x': [
                        datosX
                    ],
                    'y': [
                        datosY2
                    ],
                };
                update3 = {
                    'x': [
                        datosX
                    ],
                    'y': [
                        datosY_trace3
                    ],
                };
                update4 = {
                    'x': [
                        datosX
                    ],
                    'y': [
                        datosY_trace4
                    ],
                };


                console.log(update);

                Plotly.animate('graph_1', {

                    transition: {
                        duration: 500,
                        easing: 'cubic-in-out'
                    },
                    frame: {
                        duration: 500
                    }
                });

                Plotly.update('graph_1', update, {}, [0]);
                Plotly.update('graph_1', update2, {}, [1]);
                Plotly.update('graph_1', update3, {}, [2]);
                Plotly.update('graph_1', update4, {}, [3]);


            },
        });
    }, 2000);
    /*
            s   etInterval(() => {
        let active = 1
        $.ajax({
            type: 'POST',
            url: '../Controller/gen_data_graphs.php',
            data: {
                'active': active
            },
            success: function(res) {
                // console.log(res);
                //console.log(JSON.stringify(res[1]));
                /*datosX = crearCadenaLineal(json);
                datosY = crearCadenaLineal(r);
                datosY2 = crearCadenaLineal(f);
                
                data = ObtenerJson(res);
                datosX = data[0];
                datosY = data[1];
                datosY2 = data[2];
                //console.log(datosX)
                //console.log(data);
                //console.log(datosY);
                //console.log(data[0]);
                //datosY = crearCadenaLineal(res2);
                var trace1 = {
                    x: datosX,
                    y: datosY,
                    type: 'scatter',
                    line: {
                        color: '#34f01a'
                    },
                    name: 'Documentos registrados'

                };

                var trace2 = {
                    x: datosX,
                    y: datosY2,
                    type: 'scatter',
                    line: {
                        color: '#f0981a'
                    },
                    name: 'Documentos turnados'
                };

                var update = [trace1, trace2];


                var layout = {
                    title: 'Documentos Registrados / Documentos Turnados',
                    showlegend: true
                };

                Plotly.update('graph_1', update, {}, {}, {});
            },
        });
    }, 2000)*/

});
</script>