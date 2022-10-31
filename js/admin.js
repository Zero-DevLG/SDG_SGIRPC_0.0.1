'use stric'

$(document).ready(function() {

    table_t = $('#ticket_open').dataTable({
        "bAutoWidth": false,
        destroy: true,
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
        "ajax": "",
        "columns": [{
                "data": "id_ticket"
            },
            {
                "data": "n_ticket"
            },
            {
                "data": "direccion"
            },
            {
                "data": "tema"
            },
            {
                "data": "fecha_registro"
            },
            {
                "data": "estatus",
            },
            {
                "data": "resp",
            },
            {
                "data": "fecha_limite",
            },

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



    usr = $('#usr').dataTable({
        "bAutoWidth": false,
        destroy: true,
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
        "ajax": "../Controller/get_data_tables_help.php",
        "columns": [{
                "data": "id"
            },
            {
                "data": "nombre"
            },
            {
                "data": "direccion"
            },
            {
                "data": "fecha_registro"
            },
            {
                "data": "correo",
            },
            {
                "data": "n_empleado",
            },
            {
                "data": "activo",
            },

        ],
        rowCallback: function(row, data) {



            if (data['activo'] == 0) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['activo'] == 100) {
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

    usr_int = setInterval(function() {
        usr.api().ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 1000);

    $("#usr").on('click', 'tr', function(e) {
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
        /*
        if (localStorage.getItem("window") == 2) {
            resizeIfreameD();
        }
        */
        var id_empleado = data;
        console.log("es: " + id_empleado);
        $("#resultadoBusqueda").empty();
        $("#resultadoBusqueda").html("<img id='loading_document' src='../img/loading_p2.gif'>");
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: '../View/vista_usr.php',
                data: { 'id_empleado': id_empleado },
                success: function(e) {
                    $("#resultadoBusqueda").html(e);

                },
            });
        }, 900);


    });


});