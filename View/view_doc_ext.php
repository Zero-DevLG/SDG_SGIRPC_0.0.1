                   
<head>
    <!-- SCRIPTS -->
    <script src="../js/tables.js?v=<?php echo (rand()); ?>"></script>
    <script src="../js/control_tables.js?v=<?php echo (rand()); ?>"></script>
</head>                
                   
                   
<div class="data_ext">
    <ul class='nav nav-tabs' id="tabs_documentos">
        <li><a data-toggle="tab" id="loadGen" href="#menu_g">Generados</a></li>
        <li><a data-toggle="tab" id="loadAss" href="#menu_as">Turnados</a></li>
        <li><a data-toggle="tab" id="loadAt" href="#menu_at">Atendidos</a></li>
    </ul>
    <div class="tab-content">
        <div id="menu_at" class="tab-pane fade in">
            <ul class='nav nav-tabs' id="tabs_documentos2">
                    <li><a data-toggle="tab" id="loadAreasRes" href="#menu_aR">Areas</a></li>
                    <li><a data-toggle="tab" id="loadTitularRes" href="#menu_tR">Titular</a></li>
            </ul>
            <div class="tab-content">
                <div class="option-table">
                    <div class="option-c">
                        <button id="reload-at-aR" class="btn btn-sm btn-light"><img src="../img/iconos/actualizar.png" title="Actualizar datos de la tabla"></button>
                    </div>
                </div>
                <div id="menu_aR" class="tab-pane fade in active">
                    <div id="secc_ares">
                            <table id="table_ares">
                                <thead>
                                    <th>id</th>
                                    <th>folio</th>
                                    <th>Asunto</th>
                                    <th>Folio respuesta</th>
                                    <th>Numero oficialia</th>
                                    <th>Fecha de respuesta</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                    </div>

                </div>

                <div id="menu_tR" class="tab-pane fade in">
                    <div id="secc_tres">
                            <table id="table_tres">
                                    <thead>
                                        <th>id</th>
                                        <th>folio</th>
                                        <th>Asunto</th>
                                        <th>Folio respuesta</th>
                                        <th>Numero oficialia</th>
                                        <th>Fecha de respuesta</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                            </table>
                    </div>

                </div>
            
            </div>


        </div>
        <div id="menu_g" class="tab-pane fade in active">
            <ul class='nav nav-tabs' id="tabs_documentos2">
                <li><a data-toggle="tab" id="loadAreas" href="#menu_a">Areas</a></li>
                <li><a data-toggle="tab" id="loadTitular" href="#menu_t">Titular</a></li>
                <li><a data-toggle="tab" id="loadCopias" href="#menu_cc">Copias de conocimiento</a></li>
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
                            <br>
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
                <div id="menu_cc" class="tab-pane fade in">
                <div class="content-table">
                        <div class="content-table-control">
                            <div class="option-table-2">
                                    <div class="option-c">
                                        <button id="reload-g-cc" class="btn btn-sm btn-light"><img src="../img/iconos/actualizar.png" title="Actualizar datos de la tabla"></button>
                                    </div>
                                </div>
                            </div>
                        <div class="content-table-data">
                            <table id="example_cc" style="cursor:pointer;"
                                class="table table-sm table-borderedless table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Direccion</th>
                                        <th>op_control</th>
                                        <th>N.Oficio</th>
                                        <th>Fecha registro</th>
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
        <div id="menu_as" class="tab-pane fade in">
            <ul class='nav nav-tabs' id="tabs_documentos3">
                <li><a data-toggle="tab" id="loadtt" href="#menu_ti">Turnos titular</a></li>
                <li><a data-toggle="tab" id="loadat" href="#menu_ar">Turnos areas</a></li>
                <li><a data-toggle="tab" id="loadac_t" href="#menu_ac_t">Turnos DGRDC</a></li>
                <!-- <li><a data-toggle="tab" id="loadac_2021" href="#menu_2021">Turnos titular 2021</a></li>
                <li><a data-toggle="tab" id="loadac_2021" href="#menu_2021_a">Turnos Areas 2021</a></li> -->
            </ul>
            <div class="tab-content">
                <div id="menu_ac_t" class="tab-pane fade in">
                    <div class="content-table">
                        <div class="content-table-control">
                            <div class="option-table-2">
                                        <div class="option-c">
                                            <button id="reload-t-ac" class="btn btn-sm btn-light"><img src="../img/iconos/actualizar.png" title="Actualizar datos de la tabla"></button>
                                        </div>
                            </div>
                        </div>
                        <div class="content-table-data">
                            <table id="example_ac_t" style="cursor:pointer;" class="table  table-sm table-borderedless table-hover">
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
                                    <tbody>

                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div id="menu_ti" class="tab-pane fade in">
                    <div class="content-table">
                        <div class="content-table-control">
                            <div class="option-table-2">
                                        <div class="option-c">
                                            <button id="reload-t-ti" class="btn btn-sm btn-light"><img src="../img/iconos/actualizar.png" title="Actualizar datos de la tabla"></button>
                                        </div>
                            </div>
                        </div>
                        <div class="content-table-data">
                                <table id="example_as" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
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
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="menu_ar" class="tab-pane fade in active">
                    <div class="content-table">
                        <div class="content-table-control">
                            <div class="option-table-2">
                                        <div class="option-c">
                                            <button id="reload-t-ar" class="btn btn-sm btn-light"><img src="../img/iconos/actualizar.png" title="Actualizar datos de la tabla"></button>
                                        </div>
                            </div>
                        </div>
                        <div class="content-table-data">
                                <table id="example_turnos_areas" style="cursor:pointer;"
                                    class="table  table-sm table-borderedless table-hover">
                                    <thead>
                                        <th>Id</th>
                                        <th>Folio</th>
                                        <th>N.Oficio</th>
                                        <th>Asunto</th>
                                        <th>Numero Oficialia</th>
                                        <th>Fecha oficio</th>
                                        <th>Fecha limite</th>
                                        <th>Remitente</th>
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
    

           
                 