<?php
session_start();
error_reporting(E_ERROR);
include("../Model/Conexion.php");
if ($_SESSION['usuario'] == "") {
    header("location:../Controller/cerrar_sesion.php");
}
    $id_dir = $_SESSION["id_direccion"];
    $sql = $pdo -> prepare("SELECT detalle FROM control_sp WHERE id_direccion = '$id_dir'");
    $sql->execute();
    $direccion = $sql->fetchColumn();
?>


<head>
    <script src="../js/tables_dir.js?v=<?php echo (rand()); ?>"></script>
</head>
<div id="title-dir">
<h5><?php echo $direccion; ?></h5>
</div>
<hr id="sep-main">

<div class="tab-content">
        <ul class="nav nav-tabs" id="myTab" role="tablist"> 
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Documentos recibidos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Documentos en representacion</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Documentos turnados</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#doc-at" type="button" role="tab" aria-controls="doc-at" aria-selected="false">Documentos atendidos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#doc-arch" type="button" role="tab" aria-controls="doc-arch" aria-selected="false">Archivados</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#doc-p" type="button" role="tab" aria-controls="doc-p" aria-selected="false">Cc</button>
                            </li>
        </ul>
        
        <div class="tab-content">

                      
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">  
            <div class="panel-options">
                <h6>Opciones</h6>    
                <hr>
                <button class="btn btn-sm btn-primary" id="reload-dir">Actualizar Datos</button>
            </div>
            <div class="data_table">
            <table id="doc_dir" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Folio</th>
                        <th>N.Oficio</th>
                        <th>Asunto</th>
                        <th>Num. Oficialia</th>
                        <th>Fecha oficio</th>
                        <th>Fecha limite</th>
                        <th>Remitente</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
    </div>
       
</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="panel-options">
            <h6>Opciones</h6>    
            <hr>
                <button class="btn btn-sm btn-primary" id="reload-dir-t">Actualizar Datos</button>
        </div>
        <div class="data_table">
            <table id="doc_dir_t" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Folio</th>
                            <th>N.Oficio</th>
                            <th>Asunto</th>
                            <th>Num. Oficialia</th>
                            <th>Fecha oficio</th>
                            <th>Fecha limite</th>
                            <th>Remitente</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
        
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="panel-options">
        <h6>Opciones</h6>    
        <hr>
            <button class="btn btn-sm btn-primary" id="reload-tr">Actualizar Datos</button>
    </div>
        <div class="data_table">
            <table id="doc_dir_tr" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                <thead>
                    <th>id</th>
                    <th>Folio SP</th>
                    <th>Folio dirección</th>
                    <th>Numero de oficio</th>
                    <th>Fecha limite</th>
                    <th>Turnado a</th>
                    <th>Prioridad</th>
                </thead>
            </table>
        </div>
       

    </div>
    <div class="tab-pane fade" id="doc-at" role="tabpanel" aria-labelledby="contact-tab">
    <div class="panel-options">
        <h6>Opciones</h6>    
        <hr>
            <button class="btn btn-sm btn-primary" id="reload-at">Actualizar Datos</button>
    </div>
    <div class="data_table">   
        <table id="doc_dir_at" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                <thead>
                    <th>id</th>
                    <th>Folio SP</th>
                    <th>Folio respuesta</th>
                    <th>Numero de oficio</th>
                    <th>Fecha oficio</th>
                    <th>Fecha respuesta</th>
                    <th>respuesta</th>
                </thead>
            </table>

     </div>       
  
    </div>
    <div class="tab-pane fade" id="doc-arch" role="tabpanel" aria-labelledby="contact-tab">
        <div class="panel-options">
        <h6>Opciones</h6>    
        <hr>
            <button class="btn btn-sm btn-primary" id="reload-arch">Actualizar Datos</button>
        </div>
        <div class="data_table">
            <table id="doc_dir_arch" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                <thead>
                    <th>id</th>
                    <th>Folio</th>
                    <th>Numero de oficio</th>
                    <th>Fecha oficio</th>
                    <th>Asunto</th>
                </thead>
            </table>
        </div>
       

    </div>
    <div class="tab-pane fade show" id="doc-p" role="tabpanel" aria-labelledby="home-tab">  
    <div class="panel-options">
        <h6>Opciones</h6>    
        <hr>
            <button class="btn btn-sm btn-primary" id="reload-p">Actualizar Datos</button>
        </div>    
    <div class="data_table">
            <table id="doc_dir_p" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Folio</th>
                            <th>Para</th>
                            <th>Con copia a</th>
                            <th>N.Oficio</th>
                            <th>Asunto</th>
                            <th>Num. Oficialia</th>
                            <th>Fecha oficio</th>
                            <th>Fecha limite</th>
                            <th>Remitente</th>
                            <th>Estatus</th>
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