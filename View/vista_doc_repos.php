<?php
    session_start();
    error_reporting(E_ERROR);
    date_default_timezone_set("America/Mexico_City");
    include("../Model/Conexion.php");

    //VARIABLES POST
    $id_documento = $_POST['id-document'];

    $sql = $pdo->prepare("SELECT de21.id_documento,de21.n_oficio,de21.folio FROM `documentos_externos_2021` as de21 WHERE de21.id_documento = '$id_documento'");
    $sql->execute();
    $data_doc = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach($data_doc as $get)
    {
        $id_documento = $get['id_documento'];
        $folio = $get['folio'];
        $n_oficio = $get['n_oficio'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <label for="id">ID:</label>
                <input type="text" name="id" class="form-control" id="id_doc" value="<?php echo $id_documento; ?>" disabled>
            </div>
            <div class="col-md-4">
                <label for="n_of">Numero de oficio:</label>
                <input type="text" class="form-control" name="n_of" value="<?php echo $n_oficio; ?>" disabled>
            </div>
            <div class="col-md-4">
                <label for="fol">Folio:</label>
                <input type="text" class="form-control" name="fol" id="folio" value="<?php echo $folio; ?>" disabled>
            </div>
        </div>
        <hr>
        <div class="row">
           <div class="col-md-12">
            <h5>Favor de llenar todos los campos para capturar la respuesta del documento</h5>
           </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="folio_resp_repos">Folio de respuesta:</label>
                <input type="text" name="folio_resp_repos" class="form-control" id="folio_resp_repos">
            </div>
            <div class="col-md-4">
                <label for="fecha_resp_repos">Fecha de respuesta:</label>
                <input type="date" class="form-control" id="fecha_resp_repos"> 
            </div>
            <div class="col-md-4">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="response">Respuesta:</label>
                <textarea name="response" class="form-control" id="resp_repos" cols="30" rows="5" placeholder="Escriba una breve descripción de la respuesta"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="file_repos_res">Adjuntar archivo de respuesta:</label>
                <input type="file" name="file_repos_res" id="file_repos_res" class="form-control" accept="application/pdf">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-sm btn-success" id="at_doc_repos">Atender documento</button>
                <button class="btn btn-danger btn-sm" id="btn-close-modal-repos">Cerrar</button>
            </div>
        </div>
    </div>    
</body>
</html>

<script>
    $(document).ready(()=>{

        var reposFile= '';

        $('#btn-close-modal-repos').click(()=>{
            $('#Modal-at-doc').modal('hide');
        });


        $('#file_repos_res').on('change',()=>{
          
            var ext = $('#file_repos_res').val().split('.').pop();
            //console.log(ext);
            if( $('#file_repos_res').val() != '')
            {
                if(ext == "pdf")
                {
                    reposFile = $('#file_repos_res').prop('files');
                    //console.log(reposFile);
                }else{
                    swal('Error','Por favor adjunte un archivo valido, solo se permiten archivos con formato PDF','error');
                    $('#file_repos_res').val('');
                }
            }

            
        });

        $('#at_doc_repos').click(()=>{
            
            var id_doc = $('#id_doc').val();
            var folio_resp = $('#folio_resp_repos').val();
            var fecha_resp = $('#fecha_resp_repos').val();
            var resp_repos = $('#resp_repos').val();
            var form_data = new FormData();
            form_data.append('id_doc',id_doc);
            form_data.append('folio_resp',folio_resp);
            form_data.append('fecha_resp',fecha_resp);
            form_data.append('resp_repos',resp_repos);

            if( id_doc == '' || folio_resp == '' || fecha_resp == '' || resp_repos == '' || reposFile == '')
            {
                swal('Error','Favor de llenar todos los campos','error');
            }else{
            
            

            $.ajax({
                type:           'POST',
                url:            '../Controller/reg_repos_res.php',
                data:           form_data,
                contentType:    false,
                processData:    false,
                success:    function(e)
                {   
                    console.log('PASO II');
                    var formData = new FormData();
                    console.log(reposFile);
                    console.log(id_doc);
                    formData.append('file',reposFile[0]);
                    formData.append('id_doc',id_doc);
                    console.log(JSON.stringify(formData));
                    $.ajax({
                        type:       'POST',
                        url:        '../Controller/up_file_repos.php',
                        data:       formData,
                        contentType:    false,
                        processData:    false,
                        success:    function(e){
                            $('#Modal-at-doc').modal('hide');
                            swal(e);
                        }
                    });
                    
                }
            });
            }

        });
    });
</script>