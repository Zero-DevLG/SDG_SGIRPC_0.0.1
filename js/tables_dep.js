



function showTDir() {
    //alert("Hello");
    tableDep = $('#doc_dep').DataTable({
        orderCellsTop:true,
        bAutoWidth: false,
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
        "ajax": "../helpers/funciones_dep/getDataDep.php",
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
                "data": "oficio"
            },
            {
                "data": "asunto"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "instruccion_dir"
            },
            {
                "data": "prioridad_d"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "prioridad",
                "visible": false
            }
            

        ],

        rowCallback: function(row, data) {


            if(data['prioridad'] == 1)
            {
                $($(row).find("td")[7]).css("color", "#000000");
                $($(row).find("td")[7]).css("background-color", "#E95E14"); 
            }

            if(data['prioridad'] == 2)
            {
                $($(row).find("td")[7]).css("color", "#000000");
                $($(row).find("td")[7]).css("background-color", "#F4BD1F"); 
            }

            if(data['prioridad'] == 3)
            {
                $($(row).find("td")[7]).css("color", "#000000");
                $($(row).find("td")[7]).css("background-color", "#1FEAF4"); 
            }

            if(data['prioridad'] == 4)
            {
                $($(row).find("td")[7]).css("color", "#000000");
                $($(row).find("td")[7]).css("background-color", "#BFBFBF"); 
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


    it_turn_d = setInterval(function() {
        tableDep.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 5000);
}


function showTableDepAt()
{
    var tableDepAt = $('#table_dep_at').DataTable({
        orderCellsTop:true,
    
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
        "ajax": "../helpers/funciones_dep/getDataDepAt.php",
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
                "data": "nombre_direccion"
            },
            {
                "data":"respuesta"
            },
            {
                "data":"nombre_departamento",
                "visible":false
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

            if(data['nombre_departamento'] != 'NA')
            {
                $($(row).find("td")[6]).text(data['nombre_departamento']);
            }


        }

       

    });

    it_dep_at = setInterval(function() {
        tableDepAt.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 5000);
}




function showTableDepTr()
{
    var tableDeptr = $('#table_dep_tr').DataTable({
        orderCellsTop:true,
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
        "ajax": "../helpers/funciones_dep/getDataDepTr.php",
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
        tableDeptr.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 5000);

}


$(document).ready(()=>{
    showTDir();
    showTableDepAt();
    showTableDepTr();
    $("#doc_dep").on('click', 'tr', function(e) {
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
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
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
                url: '../View/vista_doc_dep.php',
                data: { 'id-document': textoBusqueda },
                success: function(e) {
                    $('#Modal-doc').modal('show');
                    $("#data").html(e);

                },
            });
        }, 0);
    }

    });

    $("#table_dep_tr").on('click', 'tr', function(e) {
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
                    url: '../View/view_doc_dep_turn.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-doc').modal('show');
                        $("#data").html(e);
    
                    },
                });
            }, 0);
        }
    });

    $("#table_dep_at").on('click', 'tr', function(e) {
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



    $('#doc_dep  thead tr').clone(true).appendTo('#doc_dep thead');

    $('#doc_dep thead tr:eq(1) th').each(function(i){
        var title = $(this).text();//Es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar..." />');

        $('input',this).on('keyup change',function(){
            if(tableDep.column(i).search() !== this.value){
                tableDep
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        })
    });


    $('#table_dep_at  thead tr').clone(true).appendTo('#table_dep_at thead');

    $('#table_dep_at thead tr:eq(1) th').each(function(i){
        var title = $(this).text();//Es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar..." />');

        $('input',this).on('keyup change',function(){
            if(tableDepAt.column(i).search() !== this.value){
                tableDepAt
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        })
    });

    $('#table_dep_tr  thead tr').clone(true).appendTo('#table_dep_tr thead');

    $('#table_dep_tr thead tr:eq(1) th').each(function(i){
        var title = $(this).text();//Es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar..." />');

        $('input',this).on('keyup change',function(){
            if(tableDeptr.column(i).search() !== this.value){
                tableDeptr
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        })
    });

    ///TABLES

    


});

