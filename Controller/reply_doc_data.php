
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label for="date_reply">Fecha de respuesta:</label>
                <input type="date" id="date_reply" class="form-control" name="date_reply">
            </div>
           
        </div>
        <div class="row">
        <div class="col-md-4">
                <label for="folio_res">Folio de respuesta:</label>
                <input type="text" id="folio_res" class="form-control" name="folio_res">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="file">Subir archivo de respuesta</label>
                <input type="file" id="file"  name="file">
            </div>
        </div>
        <div class="row">
            <button class="btn btn-sm btn-primary" id="send_resp">Guardar respuesta</button>
        </div>
    </div>

</body>

<script>

    $(document).ready(()=>{

        $('#send_resp').click(()=>{
            let id = localStorage.getItem('id_doc');
            let date = $('#date_reply').val();
            let folio_res = $('#folio_res').val();
            console.log($('#file').prop("files")[0]);
            var data_file = $('#file').prop("files")[0];
            var form_data = new FormData();

            form_data.append("file",data_file);
            form_data.append("id",id);
            form_data.append("date",date);
            form_data.append("folio_resp",folio_res);

            console.log(id);
            console.log(JSON.stringify(id));
                $.ajax({
                    type:   'POST',
                    url:    '../Controller/save_res.php',
                    contentType: false,
                    processData: false,
                    data:   form_data,        
                    success:function(e)
                    {
                        swal(e,'Respuesta guardada, para adjuntar mas archivos hacerlo desde la sección de atendidos', {
                            buttons: {
                                Aceptar: {
                                text: "Aceptar",
                                value: "1",
                                },
                            },
                            })
                            .then((value) => {
                            switch (value) {
                                case "1":
                                    location.reload();
                                break;
                            }
                            });
                    }
                })
        });

      
    });

</script>