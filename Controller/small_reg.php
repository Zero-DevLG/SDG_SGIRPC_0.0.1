

<div id="formu3">
    <?php require('../Model/Consultas.php');  ?>
    <h1 id="title_reg">Registrar documento</h1>
    <div id="num_oficialia2">

    </div>
    <label id="enc_reg_doc" for="">
    </label>
    <div class="form-group">
        <div class="form-row">
            <div class="col-md-6">
                <label>Organismo:</label>
                <select class="form-control" name="txtorganismo_s" id="org_s" required>
                    <option value="0">Selecciona una opcion</option>
                    <?php foreach ($lista_organismo as $mostrar) { ?>
                    <option value="<?php echo utf8_encode($mostrar['id_organismo']); ?>">
                        <?php echo utf8_encode($mostrar['nombre_organismo']); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>Otro:</label>
                <div class="ui-widget">
                    <input type="text" id="otro_s" class="form-control" disabled>
                </div>
            </div>

        </div>

        <div class="form-row">
            <div class="col-md-6">
                <label>No. de oficio</label>
                <input type="text" name="n_oficio" class="form-control" id="n_oficio_s">
            </div>
            <div class="col-md-6">
                <label for="">Tipo de Documentos</label>
                <select name="txttipo" id="txttipo_s" class="form-control">
                    <?php foreach ($lista_tipo as $mostrartipo) { ?>
                    <option value="<?php echo $mostrartipo['id_tipo_doc']; ?>">
                        <?php echo $mostrartipo['descripcion']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>


        <div class="form-row">
            <div class="col-md-6">
                <label>Direccion:</label>
                <select class="form-control" id="direccion_cat_s">
                    <option value="0">Selecciona una opcion</option>
                    <?php foreach ($lista_sp as $mostrar) { ?>
                    <option value="<?php echo $mostrar['id_direccion'] ?>"><?php echo utf8_encode($mostrar['detalle']); ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form'row">
                <div class="col-md-12">
                    <label>Categoria</label>
                    <select name="txtop_c" id="top_c2" class="form-control">
                        <option value="">Selecciona una opcion</option>
                        <option value="200">Documento general</option>
                        <option value="20">Documento de la Titular</option>
                    </select>
                </div>
                <div class="col-md-6">

                    <input type="hidden" name="txtfolio2_s" id="txtfolio2_s" value="" class="form-control"
                        disabled>

                    <input type="hidden" name="txtfolio" id="txtfolio_s" value="" class="form-control">
                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-4">
                <label>Fecha del oficio</label>
                <input name="txtfecha_o" id="txtfecha_o_s" class="form-control" type="date">
            </div>
            <div class="col-md-4">
                <label>Fecha de recibido</label>
                <input name="txtfecha_r" id="txtfecha_r_s" class="form-control" type="date">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="txtremitente">Remitente: </label>
                <div class="ui-widget">
                    <input type="text" id="txtremitente_s" class="form-control">
                </div>
                <!--
                <label>Remitente</label>
                <input name="txtremitente" id="txtremitente" class="form-control" type="text">
                -->
            </div>
            <div class="col-md-6">
                <label>Cargo</label>
                <div class="ui-widget">
                    <input type="text" id="txtcargo_r_s" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-10">
                <label>Anexos:</label>
                <textarea class="form-control" name="txtAnexos" id="txtanexos_s" cols="30"
                    rows="2"></textarea>

            </div>
        </div>
        <div class="form-row">
            <div class="col-md-10">
                <label>Comentario:</label>
                <textarea class="form-control" name="txtcomentario" id="txtcomentario_s" cols="30"
                    rows="5"></textarea>

            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4">
                

            </div>
        </div>
    </div>
    <button id="btnAdj2" class="btn btn-danger btn-sm">Adjuntar archivo</button>

    <button class="btn btn-success btn-sm" id="reg_doc2" name="envia">Registrar documento</button>


</div>
<script>
    $(document).ready(function(){

        $('#org_s').change(function () {
        var valor_o = $('#org_s').val();
        //alert(valor_o);
        if (valor_o == 24) {
            $("#otro_s").prop('disabled', false);
            swal("Se ha activado la casilla 'otro' para la insercion manual del organismo, despues de ser registrado por primera vez , estara disponible en la seccion de organismos desplegable!!!");
        } else {
            $("#otro_s").prop('disabled', true);
        }
    });


        $('#txtremitente_s').autocomplete({

source: function (request, response) {
    rem = $('#txtremitente').val();
    $.ajax({
        type: 'POST',
        url: '../Controller/search_rem.php',
        data: { 'rem': rem },
        success: function (data) {
            e = JSON.parse(data)
            console.log(e);
            response(e);

        },
    });
},
minLenght: 3,


});

        $('#otro_s').autocomplete({
    source: function (request, response) {
    otro = $('#otro').val();
    $.ajax({
        type: 'POST',
        url: '../Controller/search_otro.php',
        data: { 'otro': otro },
        success: function (data) {
            e = JSON.parse(data)
            console.log(e);
            response(e);
        },
    });
},
minLenght: 3,
//source: availableTags,

});

$('#txtcargo_r_s').autocomplete({

source: function (request, response) {
    cargo = $('#txtcargo_r_s').val();
    $.ajax({
        type: 'POST',
        url: '../Controller/search_cargo.php',
        data: { 'cargo': cargo },
        success: function (data) {
            e = JSON.parse(data)
            console.log(e);
            response(e);
        },
    });
},
minLenght: 3,
//source: availableTags,

});

        $('#btnAdj2').css("top","0%");
        $('#btnAdj2').css("left","60%");
        $('#reg_doc2').css("top","0%");
        $('#reg_doc2').css("left","75%");
    });
   

$('#btnAdj2').click(function () {
        $('#modalAdjuntar').modal('show');
        var top_c = $('#top_c').val();
        var op_folio = $('#txtfolio').val();
        form_data = new FormData();
        form_data.append('top_c', top_c);
        form_data.append('op_folio', op_folio);
        alert(op_folio);
        console.log(op_folio);
        $.ajax({
            type: 'POST',
            url: '../Model/validar_archivo.php',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (r) {
                console.log(op_folio);
                $('#formArchivo').html(r);
            },
        });
    });

    $('#org').change(function () {
        var valor_o = $('#org').val();
        //alert(valor_o);
        if (valor_o == 24) {
            $("#otro").prop('disabled', false);
            swal("Se ha activado la casilla 'otro' para la insercion manual del organismo, despues de ser registrado por primera vez , estara disponible en la seccion de organismos desplegable!!!");
        } else {
            $("#otro").prop('disabled', true);
        }
    });

    $('#top_c2').change(function () {
        let op_val = $('#top_c2').val();
        console.log(op_val);
        $.ajax({
            data: { 'tipo_c': op_val },
            url: "../Controller/folio_sp.php",
            type: "POST",
            success: function (message) {
                console.log(message);
                var new_folio = message.replace(/['"]+/g, '');
                //alert(new_folio);
                $('#txtfolio2').val(new_folio);
                $('#txtfolio').val(new_folio);
                $('#num_oficialia2').html('<h3>Numero Oficialia: ' + new_folio + '</h3>');
            }
        });

    });
</script>
