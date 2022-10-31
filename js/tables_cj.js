
function showTJC() {
    console.log('TEST CJ');

    //alert("Hello");
    tableDep = $('#doc_cj').DataTable({
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
        "ajax": "../helpers/funciones_cj/getDataCj.php",
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "oficio"
            },
            {
                "data": "folio"
            },
            {
                "data": "folio_dir"
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
                "data": "instruccion"
            },
            {
                "data": "prioridad"
            },
            {
                "data":"prioridad_est",
                "visible": false

            },
            {
                "data": "estatus",
                "visible": false
            }
            

        ],

        rowCallback: function(row, data) {


            if(data['prioridad_est'] == 1)
            {
                $($(row).find("td")[8]).css("color", "#000000");
                $($(row).find("td")[8]).css("background-color", "#E95E14"); 
            }

            if(data['prioridad_est'] == 2)
            {
                $($(row).find("td")[8]).css("color", "#000000");
                $($(row).find("td")[8]).css("background-color", "#F4BD1F"); 
            }

            if(data['prioridad_est'] == 3)
            {
                $($(row).find("td")[8]).css("color", "#000000");
                $($(row).find("td")[8]).css("background-color", "#1FEAF4"); 
            }

            if(data['prioridad_est'] == 4)
            {
                $($(row).find("td")[8]).css("color", "#000000");
                $($(row).find("td")[8]).css("background-color", "#BFBFBF"); 
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
$(document).ready(()=>{

    // CALL TABLES
    showTJC();


    $("#doc_cj").on('click', 'tr', function(e) {
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
                url: '../View/vista_doc_cj.php',
                data: { 'id-document': textoBusqueda },
                success: function(e) {
                    $('#Modal-doc').modal('show');
                    $("#data").html(e);

                },
            });
        }, 0);
    }

    });



});
