





function mostrarTabla_t() {

    table_t = $('#example_titular').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "url":"../funciones_t.php",
            // error: function(){
            //      $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
            // }
        
        },
        
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "op_control"
            },
            {
                "data": "oficio"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_recibido"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],
        rowCallback: function(row, data) {



            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['estatus'] == 301) {
                $($(row).find("td")[1]).css("color", "#a95bd2");
                $($(row).find("td")[2]).css("color", "#a95bd2");
                $($(row).find("td")[3]).css("color", "#a95bd2");
                $($(row).find("td")[4]).css("color", "#a95bd2");
                $($(row).find("td")[5]).css("color", "#a95bd2");
                $($(row).find("td")[6]).css("color", "#a95bd2");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#a95bd2");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }

            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");

            }


        }


    });


    // it_t = setInterval(function() {
    //     table_t.api().ajax.reload(function() {
    //         $(".paginate_button > a").on("focus", function() {
    //             $(this).blur();
    //         });
    //     }, false);
    // }, 5000);

}





//Tabla documentos generados Atencion ciudadana

function mostrarTabla_ac() {
    table_ac = $('#example_ac').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "url": "../funciones_ac.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
        }
            ,
        "columns": [
            
          
            {
                "data": "id_documento"
            },
            {
                "data": "siglas"
            },
            {
                "data": "op_control"
            },
            {
                "data": "oficio"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_recibido"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],
        rowCallback: function(row, data) {



            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }


            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");

            }



        }

    });

    // it_ac = setInterval(function() {
    //     table_ac.api().ajax.reload(function() {
    //         $(".paginate_button > a").on("focus", function() {
    //             $(this).blur();
    //         });
    //     }, false);
    // }, 5000);

}





function mostrarTablaga() {
    table = $('#example').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "url":"../funciones.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
        },
        "columns": [
           
            {
                "data": "id_documento"
            },
            {
                "data": "siglas"
            },
            {
                "data": "op_control"
            },
            {
                "data": "oficio"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_recibido"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],
        rowCallback: function(row, data) {



            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }


            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");

            }



        }

    });

    it = setInterval(function() {
        table.api().ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 5000);

}


function mostrarAres() {


    tableAres = $('#table_ares').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "url":"../funciones_Rareas.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
            },
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "asunto"
            },
            {
                "data" : "folio_res"
            },
            {
                "data": "num"
            },
            {
                "data": "date_resp"
            }

        ]


    });

    // it_turn_rareas = setInterval(function() {
    //     tableAres.api().ajax.reload(function() {
    //         $(".paginate_button > a").on("focus", function() {
    //             $(this).blur();
    //         });
    //     }, false);
    // }, 8000);



}




function mostrarRTitular() {


    tabletres = $('#table_tres').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax:{ 
            "url":"../funciones_tres.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
        },
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "asunto"
            },
            {
                "data" : "folio_res"
            },
            {
                "data": "num"
            },
            {
                "data": "date_resp"
            }

        ]


    });

    // it_turn_a = setInterval(function() {
    //     tabletres.api().ajax.reload(function() {
    //         $(".paginate_button > a").on("focus", function() {
    //             $(this).blur();
    //         });
    //     }, false);
    // }, 8000);



}


// Turnos Areas
function mostrarAss() {


    table33 = $('#example_turnos_areas').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "url":"../funciones_turnos_areas.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
        },
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "oficio"
            },
            {
                "data": "asunto"
            },
            {
                "data": "num"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "remitente"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],
        rowCallback: function(row, data) {


            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }

            var fecha_limite = new Date(data['fecha_limite']);
            var fecha = new Date();

            if (fecha > fecha_limite && data['estatus'] == 2) {
                $($(row).find("td")[1]).css("color", "#d97f13");
                $($(row).find("td")[2]).css("color", "#d97f13");
                $($(row).find("td")[3]).css("color", "#d97f13");
                $($(row).find("td")[4]).css("color", "#d97f13");
                $($(row).find("td")[5]).css("color", "#d97f13");
                $($(row).find("td")[6]).css("color", "#d97f13");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#d97f13");
            }

            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[7]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");
                $($(row).find("td")[7]).css("background-color", "#595a5a");

            }



        }



    });

    // it_turn_a = setInterval(function() {
    //     table33.api().ajax.reload(function() {
    //         $(".paginate_button > a").on("focus", function() {
    //             $(this).blur();
    //         });
    //     }, false);
    // }, 5000);



}

function mostrarTAreas2021() {

    console.log('Adquiriendo datos');
     $('#turnos_2021_a').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "url":"../funciones_areas_2021.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
        },
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "oficio"
            },
            {
                "data": "asunto"
            },
            {
                "data": "num"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "remitente"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],
        rowCallback: function(row, data) {


            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }

            var fecha_limite = new Date(data['fecha_limite']);
            var fecha = new Date();

            if (fecha > fecha_limite && data['estatus'] == 2) {
                $($(row).find("td")[1]).css("color", "#d97f13");
                $($(row).find("td")[2]).css("color", "#d97f13");
                $($(row).find("td")[3]).css("color", "#d97f13");
                $($(row).find("td")[4]).css("color", "#d97f13");
                $($(row).find("td")[5]).css("color", "#d97f13");
                $($(row).find("td")[6]).css("color", "#d97f13");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#d97f13");
            }

            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[7]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");
                $($(row).find("td")[7]).css("background-color", "#595a5a");

            }



        }



    });

   



}


function mostrarTA2021() {

    console.log('Adquiriendo datos');
     $('#turnos_2021').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: { 
            "url":"../funciones_a_2021.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
        },
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "oficio"
            },
            {
                "data": "asunto"
            },
            {
                "data": "num"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "remitente"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],
        rowCallback: function(row, data) {


            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }

            var fecha_limite = new Date(data['fecha_limite']);
            var fecha = new Date();

            if (fecha > fecha_limite && data['estatus'] == 2) {
                $($(row).find("td")[1]).css("color", "#d97f13");
                $($(row).find("td")[2]).css("color", "#d97f13");
                $($(row).find("td")[3]).css("color", "#d97f13");
                $($(row).find("td")[4]).css("color", "#d97f13");
                $($(row).find("td")[5]).css("color", "#d97f13");
                $($(row).find("td")[6]).css("color", "#d97f13");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#d97f13");
            }

            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[7]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");
                $($(row).find("td")[7]).css("background-color", "#595a5a");

            }



        }



    });

   



}


function mostrarAc_t() {
    //alert("Hello");
    table_ac_t = $('#example_ac_t').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "url":"../funciones_ac_t.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
    },
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "oficio"
            },
            {
                "data": "asunto"
            },
            {
                "data": "num"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "remitente"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],

        rowCallback: function(row, data) {



            if (data['estatus'] == 6) {
                $($(row).find("td")[1]).css("color", "#000000");
                $($(row).find("td")[2]).css("color", "#000000");
                $($(row).find("td")[3]).css("color", "#000000");
                $($(row).find("td")[4]).css("color", "#000000");
                $($(row).find("td")[5]).css("color", "#000000");
                $($(row).find("td")[6]).css("color", "#000000");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#000000");
            }


            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }

            var fecha_limite = new Date(data['fecha_limite']);
            var fecha = new Date();

            if (fecha > fecha_limite && data['estatus'] == 2) {
                $($(row).find("td")[1]).css("color", "#e04914");
                $($(row).find("td")[2]).css("color", "#e04914");
                $($(row).find("td")[3]).css("color", "#e04914");
                $($(row).find("td")[4]).css("color", "#e04914");
                $($(row).find("td")[5]).css("color", "#e04914");
                $($(row).find("td")[6]).css("color", "#e04914");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#e04914");
            }

            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[7]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");
                $($(row).find("td")[7]).css("background-color", "#595a5a");

            }


        }

    });


    // it_turn_ac_t = setInterval(function() {
    //     table_ac_t.api().ajax.reload(function() {
    //         $(".paginate_button > a").on("focus", function() {
    //             $(this).blur();
    //         });
    //     }, false);
    // }, 5000);
}


function mostrarAs_t() {
    //alert("Hello");
    table22 = $('#example_as').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        ajax: {
            "url":"../funciones2.php",
        //     error: function(){
        //         $(window).attr('location','/SGIRPC_US_dev_2022/View/sistem_down.php');
        //    }
        },
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "oficio"
            },
            {
                "data": "asunto"
            },
            {
                "data": "num"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "remitente"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],

        rowCallback: function(row, data) {



            if (data['estatus'] == 6) {
                $($(row).find("td")[1]).css("color", "#000000");
                $($(row).find("td")[2]).css("color", "#000000");
                $($(row).find("td")[3]).css("color", "#000000");
                $($(row).find("td")[4]).css("color", "#000000");
                $($(row).find("td")[5]).css("color", "#000000");
                $($(row).find("td")[6]).css("color", "#000000");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#000000");
            }


            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }

            var fecha_limite = new Date(data['fecha_limite']);
            var fecha = new Date();

            if (fecha > fecha_limite && data['estatus'] == 2) {
                $($(row).find("td")[1]).css("color", "#e04914");
                $($(row).find("td")[2]).css("color", "#e04914");
                $($(row).find("td")[3]).css("color", "#e04914");
                $($(row).find("td")[4]).css("color", "#e04914");
                $($(row).find("td")[5]).css("color", "#e04914");
                $($(row).find("td")[6]).css("color", "#e04914");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#e04914");
            }

            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[7]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");
                $($(row).find("td")[7]).css("background-color", "#595a5a");

            }


        }

    });


    // it_turn_t = setInterval(function() {
    //     table22.api().ajax.reload(function() {
    //         $(".paginate_button > a").on("focus", function() {
    //             $(this).blur();
    //         });
    //     }, false);
    // }, 5000);
}








$(document).ready(function() {

    //mostrarTablaga();
    //mostrarTabla_t();

    $("#example_ac").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        localStorage.setItem("id_doc", data);
        //alert(data);
        console.log('iniciando');
        console.log("Este es el id" + data);

        //alert("paso 2");

        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }

        var textoBusqueda = data;
        console.log("es: " + textoBusqueda);
        $("#resultadoBusqueda").empty();
        $("#resultadoBusqueda").html("<img id='loading_document' src='../img/loading_p2.gif'>");
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: '../Model/vista_documento.php',
                data: { 'valorBusqueda': textoBusqueda },
                success: function(e) {
                    // $("#resultadoBusqueda").html(e);
                    $('#myModal').modal('show');
                    $("#data_document_p").html(e);

                },
            });
        }, 0);


    });




    $("#example").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        localStorage.setItem("id_doc", data);
        //alert(data);
        console.log('iniciando');
        console.log("Este es el id" + data);

        //alert("paso 2");


        var textoBusqueda = data;
        console.log("es: " + textoBusqueda);
        $("#resultadoBusqueda").empty();
        $("#resultadoBusqueda").html("<img id='loading_document' src='../img/loading_p2.gif'>");
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: '../Model/vista_documento.php',
                data: { 'valorBusqueda': textoBusqueda },
                success: function(e) {
                    // $("#resultadoBusqueda").html(e);                   
                    $('#myModal').modal('show');
                    $("#data_document_p").html(e);

                },
            });
        }, 900);


    });







    ////Definicion de tablas con datatable



    table_cc = $('#example_cc').dataTable({
        "bAutoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        "ajax": "../funciones_cc.php",
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "siglas"
            },
            {
                "data": "op_control"
            },
            {
                "data": "oficio"
            },
            {
                "data": "fecha_registro"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_recibido"
            }

        ]


    });


    ///////////////////////////////////////////////////////////////////////
    $("#table_ares").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        localStorage.setItem("id_doc", data);
        console.log('iniciando');
        console.log(data);

        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }


        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log(textoBusqueda);

            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../View/vista_atendido.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(e) {
                       
                        // $("#resultadoBusqueda").html(mensaje2);
                    $('#myModal').modal('show');
                    $("#data_document_p").html(e);
                        
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });

    $("#table_tres").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        localStorage.setItem("id_doc", data);
        console.log('iniciando');
        console.log(data);

        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }


        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log(textoBusqueda);

            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../View/vista_atendido.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(e) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        //console.log("Es:" + textoBusqueda);
                        // $("#resultadoBusqueda").html(mensaje2);
                        $('#myModal').modal('show');
                        $("#data_document_p").html(e);
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });



    $("#turnos_2021_a").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        localStorage.setItem("id_doc", data);
        console.log('iniciando');
        console.log(data);

        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }


        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log('Buscando documento');
            console.log(textoBusqueda);

            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../Model/vista_as_2021.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(mensaje2) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        console.log("Es turno 2021:" + textoBusqueda);
                        $("#resultadoBusqueda").html(mensaje2);
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });


    $("#turnos_2021").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        localStorage.setItem("id_doc", data);
        console.log('iniciando');
        console.log(data);

        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }


        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log('Buscando documento');
            console.log(textoBusqueda);

            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../Model/vista_as_2021.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(mensaje2) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        console.log("Es turno 2021:" + textoBusqueda);
                        $("#resultadoBusqueda").html(mensaje2);
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });

    $("#example_turnos_areas").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        localStorage.setItem("id_doc", data);
        console.log('iniciando');
        console.log(data);

        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log(textoBusqueda);

            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../Model/vista_documento_as.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(e) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        //console.log("Es:" + textoBusqueda);
                        // $("#resultadoBusqueda").html(mensaje2);
                        $('#myModal').modal('show');
                        $("#data_document_p").html(e);
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });


    $("#example_ac_t").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        console.log('iniciando');
        console.log(data);

        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }

        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log(textoBusqueda);
            localStorage.setItem("id_doc", data);
            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../Model/vista_documento_as.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(e) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        //console.log("Es:" + textoBusqueda);
                        // $("#resultadoBusqueda").html(mensaje2);
                        $('#myModal').modal('show');
                        $("#data_document_p").html(e);
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });


    $("#example_as").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        console.log('iniciando');
        console.log(data);

        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }

        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log(textoBusqueda);
            localStorage.setItem("id_doc", data);
            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../Model/vista_documento_as.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(e) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        //console.log("Es:" + textoBusqueda);
                        // $("#resultadoBusqueda").html(mensaje2);
                        $('#myModal').modal('show');
                        $("#data_document_p").html(e);
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });
    $("#example_titular").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ecb31b");
            $(this).addClass('selected');
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        localStorage.setItem("id_doc", data);
        //alert(data);
        console.log('iniciando');
        console.log("Este es el id" + data);

        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }



        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log("es: " + textoBusqueda);
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").html("<img id='loading_document' src='../img/loading_p2.gif'>");
            setTimeout(function() {
                if (textoBusqueda != "") {
                    $.post(
                        "../Model/vista_documento.php", {
                            valorBusqueda: textoBusqueda
                        },
                        function(e) {
                            var c2 = document.querySelector(
                                "#resultadoBusqueda");
                            //console.log("Es:" + textoBusqueda);
                            $("#resultadoBusqueda").empty();
                            // $("#resultadoBusqueda").html(mensaje2);
                            $('#myModal').modal('show');
                            $("#data_document_p").html(e);
                        }
                    );
                } else {
                    $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
                }
            }, 0);

            //alert(textoBusqueda);

        });
    });



});