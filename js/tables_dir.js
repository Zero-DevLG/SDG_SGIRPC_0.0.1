
function load()
{
      $('#modalLoading').modal('show');
        setTimeout(() => {
            $('#modalLoading').modal('hide');
        }, 2000);
}


function showTDir_P() {
    //alert("Hello");
    tableDocP = $('#doc_dir_p').DataTable({
        orderCellsTop:true,
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
        "ajax": "../helpers/funciones_dir/getDataDir_p.php",
        "columns": [
            {
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "dir_o"
            },
            {
                "data": "dir_p"
            },
            {
                "data": "oficio"
            },
            {   
                "data": "asunto"
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
                "data": "confirm"       
            }

        ],

        rowCallback: function(row, data) {



            
            if (data['confirm'] == 'No enterado') {
                $($(row).find("td")[9]).css("background-color", "#F1F19C");
            }

            if (data['confirm'] == 'Enterado') {
                $($(row).find("td")[9]).css("background-color", "#9CD7F1");
            }

            if (data['estatus'] == 4) {
                $($(row).find("td")[9]).css("background-color", "#78EAAA");
            }

            // doc_in = localStorage.getItem("id_doc");
            // if (data['id_documento'] == doc_in) {
            //     $($(row).find("td")[1]).css("color", "white");
            //     $($(row).find("td")[2]).css("color", "white");
            //     $($(row).find("td")[3]).css("color", "white");
            //     $($(row).find("td")[4]).css("color", "white");
            //     $($(row).find("td")[5]).css("color", "white");
            //     $($(row).find("td")[6]).css("color", "white");
            //     $($(row).find("td")[7]).css("color", "white");
            //     $($(row).find("td")[0]).css("color", "white");
            //     $($(row).find("td")[0]).css("background-color", "#595a5a");
            //     $($(row).find("td")[1]).css("background-color", "#595a5a");
            //     $($(row).find("td")[2]).css("background-color", "#595a5a");
            //     $($(row).find("td")[3]).css("background-color", "#595a5a");
            //     $($(row).find("td")[4]).css("background-color", "#595a5a");
            //     $($(row).find("td")[5]).css("background-color", "#595a5a");
            //     $($(row).find("td")[6]).css("background-color", "#595a5a");
            //     $($(row).find("td")[7]).css("background-color", "#595a5a");

            // }


        }

    });


    it_doc_p = setInterval(function() {
        tableDocP.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 20000);
}


$('#reload-p').click(()=>
{
    load();
    tableDocP.ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
        });
    }, false);
});





function showTDir() {
    //alert("Hello");
    table22 = $('#doc_dir').DataTable({
        orderCellsTop:true,
        bAutoWidth: false,
        destroy: true,
        columnDefs: [
            { width: 10, targets: 0 }
          ],
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
        "ajax": "../helpers/funciones_dir/getDataDir.php",
        "columns": [
            {
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


    it_turn_t = setInterval(function() {
        table22.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 20000);
}

$('#reload-dir').click(()=>
{
    load();
    table22.ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
        });
    }, false);
});


function showTDir_t() {
    //alert("Hello");
    table_dir_t = $('#doc_dir_t').DataTable({
        orderCellsTop:true,
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
        "ajax": "../helpers/funciones_dir/getDataDir_t.php",
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

                // doc_in = localStorage.getItem("id_doc");
                // if (data['id_documento'] == doc_in) {
                //     $($(row).find("td")[1]).css("color", "white");
                //     $($(row).find("td")[2]).css("color", "white");
                //     $($(row).find("td")[3]).css("color", "white");
                //     $($(row).find("td")[4]).css("color", "white");
                //     $($(row).find("td")[5]).css("color", "white");
                //     $($(row).find("td")[6]).css("color", "white");
                //     $($(row).find("td")[7]).css("color", "white");
                //     $($(row).find("td")[0]).css("color", "white");
                //     $($(row).find("td")[0]).css("background-color", "#595a5a");
                //     $($(row).find("td")[1]).css("background-color", "#595a5a");
                //     $($(row).find("td")[2]).css("background-color", "#595a5a");
                //     $($(row).find("td")[3]).css("background-color", "#595a5a");
                //     $($(row).find("td")[4]).css("background-color", "#595a5a");
                //     $($(row).find("td")[5]).css("background-color", "#595a5a");
                //     $($(row).find("td")[6]).css("background-color", "#595a5a");
                //     $($(row).find("td")[7]).css("background-color", "#595a5a");

                // }


        }

    });


    it_turn_t2 = setInterval(function() {
        table_dir_t.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 20000);
}

$('#reload-dir-t').click(()=>
{
    load();
    table_dir_t.ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
        });
    }, false);
});








function formatoFecha(fecha, formato) {
    //console.log(fecha);
    const map = {
        dd: fecha.getDate(),
        mm: fecha.getMonth() + 1,
        yyyy: fecha.getFullYear()
    }
    //console.log(formato.replace(/dd|mm|yyyy/gi, matched => map[matched]));
    return formato.replace(/dd|mm|yyyy/gi, matched => map[matched]);
    
}




$(document).ready(()=>{


    //Tablas
    var table_dir_tr = $('#doc_dir_tr').DataTable({
        orderCellsTop:true,
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
        "ajax": "../helpers/funciones_dir/getDataDirTr.php",
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "folio_dir"
            },
            {
                "data": "n_oficio"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "nombre_direccion"
            },
            {
                "data": "detalle"
            },
            {
                "data": "prioridad",
                "visible": false
            },
            {
                "data":"estatus_ins",
                "visible":false

            },
            {
                "data": "estatus",
                "visible": false
            }

        ],

        rowCallback: function(row, data) {


            

            if(data['prioridad'] == 1)
            {
                $($(row).find("td")[6]).css("color", "#000000");
                $($(row).find("td")[6]).css("background-color", "#E95E14"); 
            }

            if(data['prioridad'] == 2)
            {
                $($(row).find("td")[6]).css("color", "#000000");
                $($(row).find("td")[6]).css("background-color", "#F4BD1F"); 
            }

            if(data['prioridad'] == 3)
            {
                $($(row).find("td")[6]).css("color", "#000000");
                $($(row).find("td")[6]).css("background-color", "#1FEAF4"); 
            }

            if(data['prioridad'] == 4)
            {
                $($(row).find("td")[6]).css("color", "#000000");
                $($(row).find("td")[6]).css("background-color", "#BFBFBF"); 
            }

            if(data['prioridad'] == 1)
            {
                $($(row).find("td")[6]).css("color", "#000000");
                $($(row).find("td")[6]).css("background-color", "#E95E14"); 
            }



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


            if (data['estatus'] == 3) {
                $($(row).find("td")[1]).css("color", "#000000");
                $($(row).find("td")[2]).css("color", "#000000");
                $($(row).find("td")[3]).css("color", "#000000");
                $($(row).find("td")[4]).css("color", "#000000");
                $($(row).find("td")[5]).css("color", "#000000");
                $($(row).find("td")[6]).css("color", "#000000");
                // $($(row).find("td")[0]).css("color", "white");
                // $($(row).find("td")[0]).css("background-color", "#77E39F");
                // $($(row).find("td")[1]).css("background-color", "#77E39F");
                // $($(row).find("td")[2]).css("background-color", "#77E39F");
                // $($(row).find("td")[3]).css("background-color", "#77E39F");
                // $($(row).find("td")[4]).css("background-color", "#77E39F");
                // $($(row).find("td")[5]).css("background-color", "#77E39F");
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

            let date = new Date()


            if (Number(date) > Number(fecha_limite)) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                // $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "red");
                // $($(row).find("td")[7]).css("color", "red");
                // $($(row).find("td")[0]).css("background-color", "#e04914");
                // $($(row).find("td")[1]).css("background-color", "#e04914");
                // $($(row).find("td")[2]).css("background-color", "#e04914");
                // $($(row).find("td")[3]).css("background-color", "#e04914"); 
                // $($(row).find("td")[4]).css("background-color", "#e04914");
                // $($(row).find("td")[5]).css("background-color", "#e04914");
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


    it_turn_tr = setInterval(function() {
        table_dir_tr.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 20000);

    $('#reload-tr').click(()=>
    {
        load();
        table_dir_tr.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    });


    var table_dir_at = $('#doc_dir_at').DataTable({
        orderCellsTop:true,
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
        "ajax": "../helpers/funciones_dir/getDataDirAt.php",
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "folio_respuesta"
            },
            {
                "data": "n_oficio"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_respuesta"
            },
            {
                "data":"respuesta"
            },
            {
                "data": "estatus",
                "visible": false
            }

        ],

        rowCallback: function(row, data) {



           
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
                $($(row).find("td")[8]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");
                $($(row).find("td")[7]).css("background-color", "#595a5a");
                $($(row).find("td")[8]).css("background-color", "#595a5a");

            }

            // if(data['nombre_departamento'] == 'NA')
            // {
            //     $($(row).find("td")[7]).css("display", "none");
            // }

            // if(data['nombre_direccion'] == 'NA')
            // {
            //     $($(row).find("td")[6]).css("display", "none");
            // }



        }

       

    });

    it_turn_at = setInterval(function() {
        table_dir_at.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 10000);

    $('#reload-at').click(()=>
    {
        load();
        table_dir_at.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    });




    var table_dir_arch = $('#doc_dir_arch').DataTable({
        orderCellsTop:true, 
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
        "ajax": "../helpers/funciones_dir/getDataDirArch.php",
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "n_oficio"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "asunto"
            },
            {
                "data": "estatus",
                "visible": false
            }

        ],

        rowCallback: function(row, data) {



           
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
                $($(row).find("td")[8]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");
                $($(row).find("td")[7]).css("background-color", "#595a5a");
                $($(row).find("td")[8]).css("background-color", "#595a5a");

            }


        }

       

    });

    it_turn_arch = setInterval(function() {
        table_dir_arch.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 10000);


    // Boton de actualizar

    $('#reload-arch').click(()=>
    {
        load();
        console.log('TEST RELOAD');
        table_dir_arch.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    });




    //END tablas



    const date = new Date();

    date2 = formatoFecha(date,'yyyy-mm-dd');

    console.log(date2);  
   
   

    showTDir();
    showTDir_t();
    showTDir_P();
    /// seleccionar documento en seccion (general)
    $("#doc_dir").on('click', 'tr', function(e) {
        //alert('Hola mundo');
        console.log($(this).children());
        e.preventDefault();
        if($(this).children() == $(this).children("th"))
        {
            console.log($(this).children());
            swal('error');
        }else{
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
            if(id)
            {
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
                    url: '../View/vista_doc_dir.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-doc').modal('show');
                        $("#data").html(e);
    
                    },
                });
            }, 0);
            }
            //alert(id);
            
    
        }
       

    });

    /// seleccionar documento en seccion (resp)
    $("#doc_dir_t").on('click', 'tr', function(e) {
        //alert('Hola mundo');
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#9F9F9F");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        if(id){
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
                    url: '../View/vista_doc_dir.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-doc').modal('show');
                        $("#data").html(e);
    
                    },
                });
            }, 0);
        }
    });

    /// seleccionar documento en seccion (turnados)
    $("#doc_dir_tr").on('click', 'tr', function(e) {
        //alert('Hola mundo');
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }

        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        if(id){
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
                    url: '../View/vista_doc_dir_turn.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-doc').modal('show');
                        $("#data").html(e);
    
                    },
                });
            }, 0);
        }
    });


    $("#doc_dir_at").on('click', 'tr', function(e) {
        //alert('Hola mundo');
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#9F9F9F");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        if(id){
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
                    url: '../View/view_response_doc_dir.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-doc').modal('show');
                        $("#data").html(e);
    
                    },
                });
            }, 0);
        }
    });

    $("#doc_dir_p").on('click', 'tr', function(e) {
        //alert('Hola mundo');
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#9F9F9F");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        if(id){
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
                    url: '../View/view_p_doc.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-doc').modal('show');
                        $("#data").html(e);
    
                    },
                });
            }, 0);
        }
    });



    $("#doc_dir_arch").on('click', 'tr', function(e) {
        //alert('Hola mundo');
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#9F9F9F");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        if(id){
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
                    url: '../View/view_response_doc_dir.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-doc').modal('show');
                        $("#data").html(e);
    
                    },
                });
            }, 0);
        }
    });


     //Crea una fila fila en el head  y se clona para cada columna (At)
     $('#doc_dir_at  thead tr').clone(true).appendTo('#doc_dir_at thead');

     $('#doc_dir_at thead tr:eq(1) th').each(function(i){
         var title = $(this).text();//Es el nombre de la columna
         $(this).html('<input type="text" placeholder="Buscar..." />');
 
         $('input',this).on('keyup change',function(){
             if(table_dir_at.column(i).search() !== this.value){
                 table_dir_at
                     .column(i)
                     .search(this.value)
                     .draw();
             }
         })
     });

     $('#doc_dir_arch  thead tr').clone(true).appendTo('#doc_dir_arch thead');

     $('#doc_dir_arch thead tr:eq(1) th').each(function(i){
         var title = $(this).text();//Es el nombre de la columna
         $(this).html('<input type="text" placeholder="Buscar..." />');
 
         $('input',this).on('keyup change',function(){
             if(table_dir_at.column(i).search() !== this.value){
                 table_dir_at
                     .column(i)
                     .search(this.value)
                     .draw();
             }
         })
     });




    
     //Crea una fila fila en el head  y se clona para cada columna (Gen)
     $('#doc_dir  thead tr').clone(true).appendTo('#doc_dir thead');

     $('#doc_dir thead tr:eq(1) th').each(function(i){
         var title = $(this).text();//Es el nombre de la columna
         $(this).html('<input type="text" placeholder="Buscar..." />');
 
         $('input',this).on('keyup change',function(){
             if(table22.column(i).search() !== this.value){
                 table22
                     .column(i)
                     .search(this.value)
                     .draw();
             }
         })
     });



     //Crea una fila fila en el head  y se clona para cada columna (Rep)
     $('#doc_dir_t  thead tr').clone(true).appendTo('#doc_dir_t thead');

     $('#doc_dir_t thead tr:eq(1) th').each(function(i){
         var title = $(this).text();//Es el nombre de la columna
         $(this).html('<input type="text" placeholder="Buscar..." />');
 
         $('input',this).on('keyup change',function(){
             if(table_dir_t.column(i).search() !== this.value){
                 table_dir_t
                     .column(i)
                     .search(this.value)
                     .draw();
             }
         })
     });





    //Crea una fila fila en el head  y se clona para cada columna (Turnados)
    $('#doc_dir_tr  thead tr').clone(true).appendTo('#doc_dir_tr thead');

    $('#doc_dir_tr thead tr:eq(1) th').each(function(i){
        var title = $(this).text();//Es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar..." />');

        $('input',this).on('keyup change',function(){
            if(table_dir_tr.column(i).search() !== this.value){
                table_dir_tr
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        })
    })


});

