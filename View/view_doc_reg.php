      
      

<head>
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/tables.js?v=<?php echo (rand()); ?>"></script>
    <script src="../js/control_tables.js?v=<?php echo (rand()); ?>"></script>
</head>                
  



<div id="modulo_reg_doc">
        <button id="add_doc" class="btn btn-sm btn-primary">Registrar documento</button>
</div>
<hr id="hr_reg">          
<div class="data_ext">
    
    <ul class='nav nav-tabs' id="tabs_documentos">
        <li><a data-toggle="tab" id="loadGen" href="#menu_g">Generados</a></li>
    </ul>
    <div class="tab-content">
        <div id="menu_g" class="tab-pane fade in active">
            <ul class='nav nav-tabs' id="tabs_documentos2">
                <li><a data-toggle="tab" id="loadAreas" href="#menu_a">Areas</a></li>
                <li><a data-toggle="tab" id="loadTitular" href="#menu_t">Titular</a></li>
                <li><a data-toggle="tab" id="loadac" href="#menu_ac">DGRDC</a></li>
            </ul>
            <div class="tab-content">
                <div id="menu_ac" class="tab-pane fade in">
                    <div class="content-table">
                        <div class="content-table-control">
                            <div class="option-table-2">
                                        <div class="option-c">
                                            <button id="reload-g-ac" class="btn btn-sm btn-light"><img src="../img/iconos/actualizar.png" title="Actualizar datos de la tabla"></button>
                                        </div>
                                    </div>
                            </div>
                        <div class="content-table-data">
                            <table id="example_ac" style="cursor:pointer;"
                                class="table table-sm table-borderedless table-hover">
                                <thead>
                                    <tr>
                                    
                                        <th>id</th>
                                        <th>Direccion</th>
                                        <th>op_control</th>
                                        <th>N.Oficio</th>
                                        <th>Fecha oficio</th>
                                        <th>Fecha recepcion</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="menu_a" class="tab-pane fade in active">
                        <div class="content-table">
                            <div class="content-table-control">
                                <div class="option-table-2">
                                    <div class="option-c">
                                        <button id="reload-g-a" class="btn btn-sm btn-light"><img src="../img/iconos/actualizar.png" title="Actualizar datos de la tabla"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="content-table-data">
                                <table id="example" style="cursor:pointer;"
                                    class="table table-sm table-borderedless table-hover">
                                    <thead>
                                        <tr>
                                        
                                            <th>id</th>
                                            <th>Direccion</th>
                                            <th>op_control</th>
                                            <th>N.Oficio</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha recepcion</th>
                                            <th>estatus</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                            </table>
                            </div>
                        </div>
                </div>
                <div id="menu_t" class="tab-pane fade in">
                    <div class="content-table">
                        <div class="content-table-control">
                            <div class="option-table-2">
                                <div class="option-c">
                                    <button id="reload-g-t" class="btn btn-sm btn-light"><img src="../img/iconos/actualizar.png" title="Actualizar datos de la tabla"></button>
                                </div>
                            </div>
                        </div>
                        <div class="content-tabla-data">
                            <table id="example_titular" style="cursor:pointer;"
                                class="table table-sm table-borderedless table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>op_control</th>
                                        <th>N.Oficio</th>
                                        <th>Fecha oficio</th>
                                        <th>Fecha recepcion</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>




<div class="modal fade" id="ModalRegDoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
            <div id="data_document_reg"></div>
      </div>
    </div>
  </div>
</div>



<script>
    $(document).ready(()=>{
        $('#add_doc').hover(function(){
            $('#add_doc').attr('src','../img/iconos/add_on.png');
            $('#add_doc_label').show();
    });

        $('.item_subnav').hover(function(){
            $('#add_doc').attr('src','../img/iconos/add_on.png');
            $('#add_doc_label').show();
        },function(){
            $('#add_doc').attr('src','../img/iconos/add.png');
            $('#add_doc_label').hide();
        });
    });

    $('#add_doc').click(()=>{
        $.ajax({
            type:       'POST',
            url:        '../View/view_doc_reg_2.php',
            success:    function(e)
            {
                $('#ModalRegDoc').modal('show');
                $('#data_document_reg').html(e);
            }
        });
    })


</script>
    

           
                 