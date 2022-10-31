
      <?php
       error_reporting(E_ERROR);
      session_start();
      include("../Model/Conexion.php");
      if ($_SESSION['usuario'] ==""){
          header("location:../Controller/cerrar_sesion.php");
      }
      ?>
          <head>
          <meta charset="utf-8">
          <title>Documentos</title>
          
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="css/style.css" rel="stylesheet">
      
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Home</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
          <link rel="stylesheet" type="text/css" href="../css/vista_documento.css?v=<?php echo (rand()); ?>">
          <link rel="stylesheet" type="text/css" href="../css/usr_bar.css?v=<?php echo (rand()); ?>">
          <link rel="stylesheet" href="../css/navi.css?v=<?php echo (rand()); ?>">
          <link href="../css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
          <link rel="icon" href="../img/iconos/favicon.jpg" />
          <script src="https://code.jquery.com/jquery-3.5.1.js"
              integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
          <script src="../js/jquery.dataTables.min.js"></script>
          <script src="../js/dataTables.min.js"></script>
          <script src="../js/jquery-ui.js"></script>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <script src="../js/navi.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <script src="../js/d_dir.js"></script>
          </head>
      
      <body background="../img/fondo_p2.jpg">
          <?php
          include("../Model/navi.php");
          include("../Model/Consultas.php");
          include("../View/side_var_user.php");
      
          ?>
      
          <div id="contenido_dinamico">
              <div id="iframeI" style="overflow-y: auto;">
                  <div id="cab_doc">
                      <img id="banner_cd" src="../img/banners/banner_cd.jpg" alt="">
                  </div>
                    <div id="contenido">
                      <ul class='nav nav-tabs' id="tabs_documentos">
      
                          <li><a data-toggle="tab" id="loadGen" href="#menu_g">Asignados</a></li>
                          <li><a data-toggle="tab" id="loadAss" href="#menu_as">Atendidos</a></li>
                          <li><a data-toggle="tab" id="loadIns" href="#menu_ins" style="display: none;">Bienvenida</a></li>
      
                      </ul>

                      <div class="tab-content">
                        <div id="menu_g" class="tab-pane fade in active">
                        <ul id="subtabs" class='nav nav-tabs' >
                            <li><a data-toggle="tab" id="loadGen" href="#menu_d">Directos</a></li>
                            <li><a data-toggle="tab" id="loadAss" href="#menu_r">En representación</a></li>
                            <li><a data-toggle="tab" id="loadIns" href="#menu_ins" style="display: none;">Bienvenida</a></li>
                        </ul>
                        <div  class="tab-content">
                            <div id="menu_d" class="tab-pane fade in active">
                                <div id="c_t">
                                    <table id="table_as" style="cursor:pointer;" class="table  table-sm table-borderedless table-hover">
                                        <thead>
                                            <th id="id_table_doc">Id</th>
                                            <th>Folio</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Numero Oficialia</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Remitente</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                   
                            </div>
                            <div id="menu_r" class="tab-pane fade in">
                                <div id="c_t">
                                    <table id="table_r" style="cursor:pointer;" class="table  table-sm table-borderedless table-hover">
                                        <thead>
                                            <th id="id_table_doc">Id</th>
                                            <th>Folio</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Remitente</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div id="menu_as" class="tab-pane fade in">
                           
                            </table>
                        </div>
                    </div>
                </div>
            </div>                        

              
                <div id="iframeD" style="overflow-y:scroll">
                    <div id="resultadoBusqueda">
                      <img id="img_null" src="../img/null.jpg" width="450px" height="510px" alt="">
                     </div>
                </div>
      
      
    
        
      </body>
      
      
    
