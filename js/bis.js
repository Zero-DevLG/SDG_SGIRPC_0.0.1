$(document).ready(function(){

    /* numeros oficialia de partes */
    table_bis_op = $('#table_bis_op').dataTable({
      
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
        "ajax": "../funciones_bis_op.php",
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "detalle"
            },
            {
                "data": "num"
            }
        ]     
    });

    $("#table_bis_op").on('click', 'tr', function(e) {
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

        //alert("paso 2");
        $(function() {
            
            var textoBusqueda = data;
            //alert(textoBusqueda);
            
            console.log(textoBusqueda);
            $("#container-bis").empty();
            $("#container-bis").html("<img id='loading_document' src='../img/loading_p2.gif'>");
            setTimeout(function() {
                if (textoBusqueda != "") {
                    $.post(
                        "../Model/vista_bis_op.php", {
                            valorBusqueda: textoBusqueda
                        },
                        function(mensaje2) {
                            var c2 = document.querySelector("#container-bis");
                            console.log("Es:" + textoBusqueda);
                            $("#container-bis").empty();
                            $("#container-bis").html(mensaje2);
                        },
                    );
                } else {
                    $("#container-bis").html("<p>JQUERY VACIO </p>");
                }
            }, 900);
            
            //alert(textoBusqueda);
          
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);


        /////////////////////////////////////////////////////////////////////


    });


        //////////Oficialia Titular
        table_bis_op = $('#table_bis_op_t').dataTable({
      
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
            "ajax": "../funciones_bis_op_t.php",
            "columns": [{
                    "data": "id_documento"
                },
                {
                    "data": "detalle"
                },
                {
                    "data": "num"
                }
            ]     
        });

        
        $("#table_bis_op_t").on('click', 'tr', function(e) {
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
    
            //alert("paso 2");
            $(function() {
                
                var textoBusqueda = data;
                //alert(textoBusqueda);
                
                console.log(textoBusqueda);
                $("#container-bis").empty();
                $("#container-bis").html("<img id='loading_document' src='../img/loading_p2.gif'>");
                setTimeout(function() {
                    if (textoBusqueda != "") {
                        $.post(
                            "../Model/vista_bis_op_t.php", {
                                valorBusqueda: textoBusqueda
                            },
                            function(mensaje2) {
                                var c2 = document.querySelector("#container-bis");
                                console.log("Es:" + textoBusqueda);
                                $("#container-bis").empty();
                                $("#container-bis").html(mensaje2);
                            },
                        );
                    } else {
                        $("#container-bis").html("<p>JQUERY VACIO </p>");
                    }
                }, 900);
                
                //alert(textoBusqueda);
              
            });
        });
    

        ///////////////////////////



    /* */ 

    
    table = $('#table_bis').dataTable({
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
        "ajax": "../funciones_bis.php",
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "op_control"
            },
            {
                "data": "folio"
            },
            {
                "data": "detalle"
            }
        ]
    });

    $("#table_bis").on('click', 'tr', function(e) {
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

        //alert("paso 2");
        $(function() {
            
            var textoBusqueda = data;
            //alert(textoBusqueda);
            
            console.log(textoBusqueda);
            $("#container-bis").empty();
            $("#container-bis").html("<img id='loading_document' src='../img/loading_p2.gif'>");
            setTimeout(function() {
                if (textoBusqueda != "") {
                    $.post(
                        "../Model/vista_bis.php", {
                            valorBusqueda: textoBusqueda
                        },
                        function(mensaje2) {
                            var c2 = document.querySelector(
                                "#container-bis");
                            //console.log("Es:" + textoBusqueda);
                            $("#container-bis").empty();
                            $("#container-bis").html(mensaje2);
                        }
                    );
                } else {
                    $("#container-bis").html("<p>JQUERY VACIO </p>");
                }
            }, 900);
            
            //alert(textoBusqueda);
          
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);


        /////////////////////////////////////////////////////////////////////


    });



});