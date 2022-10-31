<?php
    session_start();
    include('../Model/Conexion.php');

    //Variables de session
    $id_dir_gen = $_SESSION["id_direccion"];

    //Se obtienen los datos
    
    //Se obtienen los documentos para la direccion
    $sql = $pdo->prepare("SELECT COUNT(de.id_documento) FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE di.direccion = '$id_dir_gen'");
    $sql->execute();
    $cdir = $sql->fetchColumn();

    //Se obtienen los documentos en representacion 
    $sql = $pdo->prepare("SELECT COUNT(de.id_documento) FROM documentos_externos as de INNER JOIN doc_ext_res as res ON res.id_documento = de.id_documento WHERE res.id_direccion= '$id_dir_gen'");
    $sql->execute();
    $crep = $sql->fetchColumn();


    // Segundas estadisticas

        //Documentos totales recibidos para la dirección
        $sql = $pdo->prepare("SELECT COUNT(id_documento) FROM documento_instruccion WHERE direccion= '$id_dir_gen'");
        $sql->execute();
        $doc_rec_g = $sql->fetchColumn();

        // Documentos en representación
        $sql = $pdo->prepare("SELECT COUNT(di.id_documento) FROM documento_instruccion as di INNER JOIN doc_ext_res as res ON res.id_documento = di.id_documento WHERE res.id_direccion= '$id_dir_gen'");
        $sql->execute();
        $doc_rec_res = $sql->fetchColumn();    

        //Documentos en total
        $doc_total = $doc_rec_g + $doc_rec_res;

        $doc_rec_g_p = ($doc_rec_g * 100)/$doc_total;
        $doc_rec_res_p = ($doc_rec_res * 100)/$doc_total;

        //Documentos atendidos
        $sql = $pdo->prepare("SELECT COUNT(id_documento) FROM documentos_atendidos WHERE id_direccion_general = '$id_dir_gen'");
        $sql->execute();
        $doc_at_g = $sql->fetchColumn();

        //Documentos sin atender
        $doc_sat = $doc_total - $doc_at_g;

        //Documentos turnados
        $sql = $pdo->prepare("SELECT COUNT(DISTINCT id_documento) FROM instrucciones_direcciones WHERE id_direccion_general = '$id_dir_gen'");
        $sql->execute();
        $doc_turn = $sql->fetchColumn();




?>
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/dashboard.css?v=<?php echo (rand()); ?>">
    
    <!-- JS -->
    <script src="../js/plotly-latest.min.js"></script>
    <script src="../js/plotly-locale-es.js"></script>
</head>
<div id="title_dashboard">
    <h5>Tablero de estadisticas</h5>
</div>
<hr class="hr_ds">
<div id="ind">
    <h6>Los datos representados a continuación corresponden unicamento al año en curso.</h6>
</div>
<div>
    <div id="graph_1"></div>
    <div id="stats">
        <div id="table_stats">
            <table class="table table-border table-striped table-sm">
                <thead class="table-danger">
                    <th>Concepto</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Documentos recibidos</td>
                        <td><input type="text" id="doc_g" value="<?php echo $doc_rec_g; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Documentos recibidos en representación</td>
                        <td><input type="text" id="doc_rep" value="<?php echo $doc_rec_res; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Documentos recibidos totales</td>
                        <td><input type="text" id="doc_t" value="<?php echo $doc_total; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Documentos atendidos</td>
                        <td><input type="text" id="doc_at" value="<?php echo $doc_at_g; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Documentos sin atender</td>
                        <td><input type="text" id="doc_sat" value="<?php echo $doc_sat; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Documentos turnados</td>
                        <td><input type="text" id="doc_tr" value="<?php echo $doc_turn; ?>" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="graph_doc_reg"></div>
        <div id="graph_doc_stat"></div>
        
    </div>
</div>



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
    console.log('Obteninedo grafica');
                let active = 1
                $.ajax({
                    type: 'POST',
                    url: '../Controller/getDataGraphsDir.php',
                    success: function(res) {
                        console.log('RES');
                        console.log(res);
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
                            line:
                            {
                                color: '#55C5EE'
                            },
                            name: 'Documentos en representación'
                        }

                        var trace2 = {
                            x: datosX,
                            y: datosY2,
                            type: 'scatter',
                            line: {
                                color: '#BE29E3'
                            },
                            name: 'Documentos recibidos'
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


                        var data = [ trace1, trace2, trace3, trace4];


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



function get_graph_2()
{
    var doc_g = $('#doc_g').val();
    var doc_rep = $('#doc_rep').val();

    var data = [{

        values: [doc_g, doc_rep],

        labels: ['Documentos recibidos', 'Documentos recibidos en representación'],

        type: 'pie'

        }];


        var layout = {

        height: 400,

        width: 600

        };


    Plotly.newPlot('graph_doc_reg', data, layout, {
                        displayModeBar: false
                        }, {
                            locale: 'es'});

}

function get_graph_3()
{
    var doc_at = $('#doc_at').val();
    var doc_sat = $('#doc_sat').val();
    var doc_tr = $('#doc_tr').val();

    var data = [{

        values: [doc_at, doc_sat,doc_tr],

        labels: ['Documentos atendidos', 'Documentos sin atender','Documentos turnados'],

        type: 'pie'

        }];


        var layout = {

        height: 400,

        width: 600

        };


    Plotly.newPlot('graph_doc_stat', data, layout, {
                        displayModeBar: false
                        }, {
                            locale: 'es'});

}

    $(document).ready(()=>{
        console.log('init');
        get_data_paint();
        get_graph_2();
        get_graph_3();




    });


</script>