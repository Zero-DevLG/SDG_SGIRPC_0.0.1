<?php
    $year = $_POST['year'];

?>

<div id="info-year">
    <label for="year">
        <h4>Año seleccionado:</h4>
    </label>
    <input type="text" class="form-control" id="year" value="<?php echo $year; ?>" disabled>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist"> 
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Documentos recibidos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Documentos en representacion</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="at-tab" data-bs-toggle="tab" data-bs-target="#at" type="button" role="tab" aria-controls="at" aria-selected="false">Documentos atendidos</button>
                            </li>
</ul>

<div class="tab-content" id="tab-content-repos">
    <div class="tab-pane fade show active" id="home" role="tabpanel"                aria-labelledby="home-tab">
        <div id="table-repos">
            <div id="btn-reload">
                <button id="reloadDataRepos" class="btn btn-warning btn-sm">Actualizar datos</button>
            </div>
                <br>
                <hr>
                <table id="table_repos" class="table table-sm">
                    <thead>
                        <th>id_documento</th>
                        <th>Folio</th>
                        <th>No. oficio</th>
                        <th>Fecha de registro</th>
                        <th>Asunto</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
    </div>
    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div id="table-repos">
            <div id="btn-reload">
                <button id="reloadDataReposT" class="btn btn-warning btn-sm">Actualizar datos</button>
            </div>
                <br>
                <hr>
                <table id="table_reposT" class="table table-sm">
                    <thead>
                        <th>id_documento</th>
                        <th>Folio</th>
                        <th>No. oficio</th>
                        <th>Fecha de registro</th>
                        <th>Asunto</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
    </div>

    <div class="tab-pane fade show active" id="at" role="tabpanel"                aria-labelledby="home-tab">
        <div id="table-repos_at">
            <div id="btn-reload">
                <button id="reloadDataRepos" class="btn btn-warning btn-sm">Actualizar datos</button>
            </div>
                <br>
                <hr>
                <table id="table_repos_at" class="table table-sm">
                    <thead>
                        <th>id_documento</th>
                        <th>Folio</th>
                        <th>No. oficio</th>
                        <th>Folio respuesta</th>
                        <th>Archivo adjunto</th>
                    </thead>
                    <tbody>
<a href=""></a>
                    </tbody>
                </table>
        </div>
    </div>

</div>



<script>
    $(document).ready(()=>{

        var e = $('#year').val();


        tableDocRepos = $('#table_repos').DataTable({
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
        "ajax":
        {
            'type':     "POST",
            'url':      "../helpers/funciones_dir/getDataRepos.php",
            'data':     {'year':e}
        }, 
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
                "data": "fecha_recibido"
            },
            {
                "data": "asunto"
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

          


        }

    });


    tableDocRepos = $('#table_reposT').DataTable({
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
        "ajax":
        {
            'type':     "POST",
            'url':      "../helpers/funciones_dir/getDataReposT.php",
            'data':     {'year':e}
        }, 
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
                "data": "fecha_recibido"
            },
            {
                "data": "asunto"
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

          


        }

    });


    tableDocRepos = $('#table_repos_at').DataTable({
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
        "ajax":
        {
            'type':     "POST",
            'url':      "../helpers/funciones_dir/getDataRepos_at.php",
            'data':     {'year':e}
        }, 
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
                "data": "folio_resp"
            },
            {
                "data": "file"
            }

        ]

    });




    $('#reloadDataRepos').click(()=>
    {
        console.log('TEST RELOAD');
        load();
        tableDocRepos.ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    });

    $("#table_repos").on('click', 'tr', function(e) {
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
                    url: '../View/vista_doc_repos.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-at-doc').modal('show');
                        $("#data-at").html(e);
    
                    },
                });
            }, 0);
            }
            //alert(id);
            
    
        }
       

    });

    $("#table_reposT").on('click', 'tr', function(e) {
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
                    url: '../View/vista_doc_repos.php',
                    data: { 'id-document': textoBusqueda },
                    success: function(e) {
                        $('#Modal-at-doc').modal('show');
                        $("#data-at").html(e);
    
                    },
                });
            }, 0);
            }
            //alert(id);
            
    
        }
       

    });
    });
</script>