<?php

    session_start();
    include("../Model/navBar.php");
    $bar = new navBaradmin();
    $bar->construye();
    require("../Controller/documento_controlador.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentos</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.12.0.js"></script>
    <script type="text/javascript" src="../js/editor.js"></script>
    <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/editor.css">
    <link rel="stylesheet" type="text/css" href="../css/documento_estilos.css">


    <script type="text/javascript">
    $(document).ready(function() {
        $('#txt-content').Editor();
    });
    </script>
</head>

<body>

    <form name="formu" id="formu" action="upload.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                    <img src="../img/banner_d.png" width="700px" height="70px" />
                    <h3>Registro de Documento</h3>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3">
                    <label>No.Folio</label>
                    <input name="txtfolio" class="form-control" type="text" value="<?php print $folio; ?>"
                        readonly="readonly">
                </div>
                <div class="col-md-3">
                    <label>Fecha del oficio</label>
                    <input name="txtfecha_o" class="form-control" type="date">
                </div>
                <div class="col-md-3">
                    <label>Fecha de recibido</label>
                    <input name="txtfecha_r" class="form-control" type="date">
                </div>
                <div class="col-md-3">
                    <label>No. de oficio</label>
                    <input name="txtn_oficio" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label>Remitente</label>
                    <input name="txtremitente" class="form-control" type="text">
                </div>
                <div class="col-md-6">
                    <label>Cargo</label>
                    <input name="txtcargo_r" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Tipo de documento</label>
                    <select name="txttipodocumento" class="form-control">
                        <option value="oficio">Oficio</option>
                        <option value="nota informativa">Nota Informativa</option>
                        <option value="memorandum">Memorandum</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Asunto</label>
                    <div class="container">
                        <textarea id="editor1" name="editor1" class="form-control"></textarea>
                        <script type="text/javascript">
                        CKEDITOR.replace('editor1');
                        </script>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-10">
                    <label>Archivos a Subir:</label>
                    <!-- Esta div contendrá todos los campos file que creemos -->
                    <div id="adjuntos">
                        <!-- Hay que prestar atención a esto, el nombre de este campo debe siempre terminar en []
        como un vector, y ademas debe coincidir con el nombre que se da a los campos nuevos 
        en el script -->
                        <input type="file" name="archivos[]" /><br />
                    </div>
                    <br>
                </div>
                <div class="col-md-2">
                    <br>
                    <a class="btn btn-info btn-sm" href="#" onClick="addCampo()">Subir otro archivo</a>
                </div>


            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <dd><input class="btn btn-primary btn-sm" type="submit" value="Enviar" id="envia" name="envia" />
                    </dd>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
    var numero = 0; //Esta es una variable de control para mantener nombres
    //diferentes de cada campo creado dinamicamente.
    evento = function(evt) { //esta funcion nos devuelve el tipo de evento disparado
        return (!evt) ? event : evt;
    }

    //Aqui se hace la magia... jejeje, esta funcion crea dinamicamente los nuevos campos file
    addCampo = function() {
        //Creamos un nuevo div para que contenga el nuevo campo
        nDiv = document.createElement('div');
        //con esto se establece la clase de la div
        nDiv.className = 'archivo';
        //este es el id de la div, aqui la utilidad de la variable numero
        //nos permite darle un id unico
        nDiv.id = 'file' + (++numero);
        //creamos el input para el formulario:
        nCampo = document.createElement('input');
        //le damos un nombre, es importante que lo nombren como vector, pues todos los campos
        //compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
        nCampo.name = 'archivos[]';
        //Establecemos el tipo de campo
        nCampo.type = 'file';
        //Ahora creamos un link para poder eliminar un campo que ya no deseemos
        a = document.createElement('a');
        //El link debe tener el mismo nombre de la div padre, para efectos de localizarla y eliminarla
        a.name = nDiv.id;
        //Este link no debe ir a ningun lado
        a.href = '#';
        //Establecemos que dispare esta funcion en click
        a.onclick = elimCamp;
        //Con esto ponemos el texto del link
        a.innerHTML = 'Eliminar';
        //Bien es el momento de integrar lo que hemos creado al documento,
        //primero usamos la función appendChild para adicionar el campo file nuevo
        nDiv.appendChild(nCampo);
        //Adicionamos el Link
        nDiv.appendChild(a);
        //Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
        //con esta función obtenemos una referencia a ella para usar de nuevo appendChild
        //y adicionar la div que hemos creado, la cual contiene el campo file con su link de eliminación:
        container = document.getElementById('adjuntos');
        container.appendChild(nDiv);
    }
    //con esta función eliminamos el campo cuyo link de eliminación sea presionado
    elimCamp = function(evt) {
        evt = evento(evt);
        nCampo = rObj(evt);
        div = document.getElementById(nCampo.name);
        div.parentNode.removeChild(div);
    }
    //con esta función recuperamos una instancia del objeto que disparo el evento
    rObj = function(evt) {
        return evt.srcElement ? evt.srcElement : evt.target;
    }
    </script>



</body>

</html>