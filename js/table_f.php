
<?php 
error_reporting(E_ERROR);
    session_start();
    $sql = $_POST['sql'];
    $_SESSION['sql'] = $sql;

?>
<table id="example_filtros" style="cursor:pointer;"class="table  table-sm table-borderedless table-hover">
        <thead>
            <th>Id</th>
            <th>Folio</th>
            <th>N.Oficio</th>
            <th>Asunto</th>
            <th>Numero Oficialia</th>
            <th>Fecha recibido</th>
            <th>Fecha oficio</th>    
            <th>Fecha limite</th>
        </thead>
        <tbody>
        </tbody>
        </table>
<script>
$(document).ready(function(){
        table_t = $('#example_filtros').dataTable({
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
        "ajax": "../funciones_filtro.php",
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
                "data": "numero_oficialia"
            },
            {
                "data": "fecha_recibido"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "estatus",
                "visible": false
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

    $("#example_filtros").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
           // $(this).css("background-color", "#6c6a6a");
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
                    "../Model/vista_documento_as.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(mensaje2) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        //console.log("Es:" + textoBusqueda);
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

})
    
</script>