<?php


require("../Model/sessiones.php");
include("../Model/navBar.php");
include("../Model/Conexion.php");
include("../Model/Consultas.php");
$bar = new navBaradmin();
$bar->construye();

error_reporting(0);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

</body>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css">
    <link rel="stylesheet" type="text/css" href="../css/select2.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">

    <!--
        <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <!--<script src="../js/filtros.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>  
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">  
-->
    <script src="../js/main_d.js"></script>
    <script src="../js/paginator.min.js"></script>
    <script src="../js/select2.js"></script>




    <title>Panel de Administracion</title>
</head>

<body background="../img/fondo_p.jpg">




    <div id="iframeI" style="overflow-y: auto;">

        <div id="contenido2" style="width: 70%;">
            <table id="example" class="hover" style="width:100%; font-size:8px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>$433,060</td>
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012/12/02</td>
                        <td>$372,000</td>
                    </tr>
                    <tr>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>2012/08/06</td>
                        <td>$137,500</td>
                    </tr>
                    <tr>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo</td>
                        <td>55</td>
                        <td>2010/10/14</td>
                        <td>$327,900</td>
                    </tr>
                    <tr>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>2009/09/15</td>
                        <td>$205,500</td>
                    </tr>
                    <tr>
                        <td>Sonya Frost</td>
                        <td>Software Engineer</td>
                        <td>Edinburgh</td>
                        <td>23</td>
                        <td>2008/12/13</td>
                        <td>$103,600</td>
                    </tr>
                    <tr>
                        <td>Jena Gaines</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>30</td>
                        <td>2008/12/19</td>
                        <td>$90,560</td>
                    </tr>
                    <tr>
                        <td>Quinn Flynn</td>
                        <td>Support Lead</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2013/03/03</td>
                        <td>$342,000</td>
                    </tr>
                    <tr>
                        <td>Charde Marshall</td>
                        <td>Regional Director</td>
                        <td>San Francisco</td>
                        <td>36</td>
                        <td>2008/10/16</td>
                        <td>$470,600</td>
                    </tr>
                    <tr>
                        <td>Haley Kennedy</td>
                        <td>Senior Marketing Designer</td>
                        <td>London</td>
                        <td>43</td>
                        <td>2012/12/18</td>
                        <td>$313,500</td>
                    </tr>
                    <tr>
                        <td>Tatyana Fitzpatrick</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>19</td>
                        <td>2010/03/17</td>
                        <td>$385,750</td>
                    </tr>
                    <tr>
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>
                        <td>London</td>
                        <td>66</td>
                        <td>2012/11/27</td>
                        <td>$198,500</td>
                    </tr>
                    <tr>
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>
                        <td>New York</td>
                        <td>64</td>
                        <td>2010/06/09</td>
                        <td>$725,000</td>
                    </tr>
                    <tr>
                        <td>Gloria Little</td>
                        <td>Systems Administrator</td>
                        <td>New York</td>
                        <td>59</td>
                        <td>2009/04/10</td>
                        <td>$237,500</td>
                    </tr>
                    <tr>
                        <td>Bradley Greer</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>41</td>
                        <td>2012/10/13</td>
                        <td>$132,000</td>
                    </tr>
                    <tr>
                        <td>Dai Rios</td>
                        <td>Personnel Lead</td>
                        <td>Edinburgh</td>
                        <td>35</td>
                        <td>2012/09/26</td>
                        <td>$217,500</td>
                    </tr>
                    <tr>
                        <td>Jenette Caldwell</td>
                        <td>Development Lead</td>
                        <td>New York</td>
                        <td>30</td>
                        <td>2011/09/03</td>
                        <td>$345,000</td>
                    </tr>
                    <tr>
                        <td>Yuri Berry</td>
                        <td>Chief Marketing Officer (CMO)</td>
                        <td>New York</td>
                        <td>40</td>
                        <td>2009/06/25</td>
                        <td>$675,000</td>
                    </tr>
                    <tr>
                        <td>Caesar Vance</td>
                        <td>Pre-Sales Support</td>
                        <td>New York</td>
                        <td>21</td>
                        <td>2011/12/12</td>
                        <td>$106,450</td>
                    </tr>
                    <tr>
                        <td>Doris Wilder</td>
                        <td>Sales Assistant</td>
                        <td>Sydney</td>
                        <td>23</td>
                        <td>2010/09/20</td>
                        <td>$85,600</td>
                    </tr>
                    <tr>
                        <td>Angelica Ramos</td>
                        <td>Chief Executive Officer (CEO)</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2009/10/09</td>
                        <td>$1,200,000</td>
                    </tr>
                    <tr>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>42</td>
                        <td>2010/12/22</td>
                        <td>$92,575</td>
                    </tr>
                    <tr>
                        <td>Jennifer Chang</td>
                        <td>Regional Director</td>
                        <td>Singapore</td>
                        <td>28</td>
                        <td>2010/11/14</td>
                        <td>$357,650</td>
                    </tr>
                    <tr>
                        <td>Brenden Wagner</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>28</td>
                        <td>2011/06/07</td>
                        <td>$206,850</td>
                    </tr>
                    <tr>
                        <td>Fiona Green</td>
                        <td>Chief Operating Officer (COO)</td>
                        <td>San Francisco</td>
                        <td>48</td>
                        <td>2010/03/11</td>
                        <td>$850,000</td>
                    </tr>
                    <tr>
                        <td>Shou Itou</td>
                        <td>Regional Marketing</td>
                        <td>Tokyo</td>
                        <td>20</td>
                        <td>2011/08/14</td>
                        <td>$163,000</td>
                    </tr>
                    <tr>
                        <td>Michelle House</td>
                        <td>Integration Specialist</td>
                        <td>Sydney</td>
                        <td>37</td>
                        <td>2011/06/02</td>
                        <td>$95,400</td>
                    </tr>
                    <tr>
                        <td>Suki Burks</td>
                        <td>Developer</td>
                        <td>London</td>
                        <td>53</td>
                        <td>2009/10/22</td>
                        <td>$114,500</td>
                    </tr>
                    <tr>
                        <td>Prescott Bartlett</td>
                        <td>Technical Author</td>
                        <td>London</td>
                        <td>27</td>
                        <td>2011/05/07</td>
                        <td>$145,000</td>
                    </tr>
                    <tr>
                        <td>Gavin Cortez</td>
                        <td>Team Leader</td>
                        <td>San Francisco</td>
                        <td>22</td>
                        <td>2008/10/26</td>
                        <td>$235,500</td>
                    </tr>
                    <tr>
                        <td>Martena Mccray</td>
                        <td>Post-Sales support</td>
                        <td>Edinburgh</td>
                        <td>46</td>
                        <td>2011/03/09</td>
                        <td>$324,050</td>
                    </tr>
                    <tr>
                        <td>Unity Butler</td>
                        <td>Marketing Designer</td>
                        <td>San Francisco</td>
                        <td>47</td>
                        <td>2009/12/09</td>
                        <td>$85,675</td>
                    </tr>
                    <tr>
                        <td>Howard Hatfield</td>
                        <td>Office Manager</td>
                        <td>San Francisco</td>
                        <td>51</td>
                        <td>2008/12/16</td>
                        <td>$164,500</td>
                    </tr>
                    <tr>
                        <td>Hope Fuentes</td>
                        <td>Secretary</td>
                        <td>San Francisco</td>
                        <td>41</td>
                        <td>2010/02/12</td>
                        <td>$109,850</td>
                    </tr>
                    <tr>
                        <td>Vivian Harrell</td>
                        <td>Financial Controller</td>
                        <td>San Francisco</td>
                        <td>62</td>
                        <td>2009/02/14</td>
                        <td>$452,500</td>
                    </tr>
                    <tr>
                        <td>Timothy Mooney</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>37</td>
                        <td>2008/12/11</td>
                        <td>$136,200</td>
                    </tr>
                    <tr>
                        <td>Jackson Bradshaw</td>
                        <td>Director</td>
                        <td>New York</td>
                        <td>65</td>
                        <td>2008/09/26</td>
                        <td>$645,750</td>
                    </tr>
                    <tr>
                        <td>Olivia Liang</td>
                        <td>Support Engineer</td>
                        <td>Singapore</td>
                        <td>64</td>
                        <td>2011/02/03</td>
                        <td>$234,500</td>
                    </tr>
                    <tr>
                        <td>Bruno Nash</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>38</td>
                        <td>2011/05/03</td>
                        <td>$163,500</td>
                    </tr>
                    <tr>
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                        <td>Tokyo</td>
                        <td>37</td>
                        <td>2009/08/19</td>
                        <td>$139,575</td>
                    </tr>
                    <tr>
                        <td>Thor Walton</td>
                        <td>Developer</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2013/08/11</td>
                        <td>$98,540</td>
                    </tr>
                    <tr>
                        <td>Finn Camacho</td>
                        <td>Support Engineer</td>
                        <td>San Francisco</td>
                        <td>47</td>
                        <td>2009/07/07</td>
                        <td>$87,500</td>
                    </tr>
                    <tr>
                        <td>Serge Baldwin</td>
                        <td>Data Coordinator</td>
                        <td>Singapore</td>
                        <td>64</td>
                        <td>2012/04/09</td>
                        <td>$138,575</td>
                    </tr>
                    <tr>
                        <td>Zenaida Frank</td>
                        <td>Software Engineer</td>
                        <td>New York</td>
                        <td>63</td>
                        <td>2010/01/04</td>
                        <td>$125,250</td>
                    </tr>
                    <tr>
                        <td>Zorita Serrano</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>56</td>
                        <td>2012/06/01</td>
                        <td>$115,000</td>
                    </tr>
                    <tr>
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>43</td>
                        <td>2013/02/01</td>
                        <td>$75,650</td>
                    </tr>
                    <tr>
                        <td>Cara Stevens</td>
                        <td>Sales Assistant</td>
                        <td>New York</td>
                        <td>46</td>
                        <td>2011/12/06</td>
                        <td>$145,600</td>
                    </tr>
                    <tr>
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2011/03/21</td>
                        <td>$356,250</td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>$103,500</td>
                    </tr>
                    <tr>
                        <td>Jonas Alexander</td>
                        <td>Developer</td>
                        <td>San Francisco</td>
                        <td>30</td>
                        <td>2010/07/14</td>
                        <td>$86,500</td>
                    </tr>
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>Edinburgh</td>
                        <td>51</td>
                        <td>2008/11/13</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>29</td>
                        <td>2011/06/27</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011/01/25</td>
                        <td>$112,000</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>

        </div>




    </div>





    <div id="iframeD" style="overflow-y:scroll">
        <div id="resultadoBusqueda">
            <img id="img_null" src="../img/null.jpg" alt="">
        </div>
    </div>


    <div id="btn-content">
        <div id="toggle_f"></div>
        <div id="overlay2"></div>
        <div id="toggle"></div>
        <div id="overlay"></div>
    </div>


    <div id="menu2">
        <form action="#" method="POST" name="formulario" id="formulario" onsubmit="return false;">
            <div class="form-group">

                <div class="form-row">
                    <div class="col-md-3">
                        <center>
                            <h3>Fecha del oficio</h3>
                        </center>
                    </div>
                    <div class="col-md-4">
                        <center>
                            <h3>Fecha limite</h3>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <h3>Fecha de registro</h3>
                        </center>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2.5">

                        DE:<input class="form-control" id="fecha_oi" name="daterange" type="date" style="width: 135px;">
                    </div>
                    <div class="col-md-2.5">
                        HASTA:<input class="form-control" id="fecha_of" name="daterange" type="date"
                            style="width: 135px;">
                    </div>

                    <div class="col-md-2.5">

                        DE:<input class="form-control" id="fecha_li" name="daterange" type="date" style="width: 135px;">
                    </div>
                    <div class="col-md-2.5">
                        HASTA:<input class="form-control" id="fecha_lf" name="daterange" type="date"
                            style="width: 135px;">
                    </div>
                    <div class="col-md-2.5">

                        DE:<input class="form-control" id="fecha_ri" name="daterange" type="date" style="width: 135px;">
                    </div>
                    <div class="col-md-2.5">
                        HASTA:<input class="form-control" id="fecha_rf" name="daterange" type="date"
                            style="width: 135px;">
                    </div>


                </div>
                <div class="form-row">
                    <div class="col-md-8">
                        <label for="">
                            <h3>Direccion:</h3>
                        </label>
                        <select class="form-control" id="direccion" multiple="multiple" width="100%">
                            <?php foreach ($lista_dir as $mostrardir) { ?>
                            <option value="<?php echo $mostrardir['id_direccion']; ?>">
                                <?php echo $mostrardir['direccion']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5">
                        <label for="">
                            <h3>Tipo:</h3>
                        </label>
                        <select class="form-control" name="tipo[]" id="tipo" multiple="multiple" width="100%">
                            <option value="1">Oficio</option>
                            <option value="2">Nota Informativa</option>
                            <option value="3">Circular</option>
                            <option value="4">Memorandum</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="">
                            <h3>Estado</h3>
                        </label>
                        <select class="form-control" name="estado[]" id="estado" multiple="multiple" width="100%">
                            <option value="1">Generado</option>
                            <option value="2">Revision</option>
                            <option value="3">Aprobado</option>
                            <option value="4">Enviado/Sin leer</option>
                            <option value="5">Enviado/Leido</option>
                            <option value="6">En atencion</option>
                            <option value="7">Desfasado</option>
                            <option value="8">Rechazado</option>
                            <option value="9">Atendido</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <br>
                        <button class="btn btn-success btn-sm" id="enviar" name="buscar" type="submit"> Buscar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="menu">

        <form name="formu" id="formu" action="upload.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-2">
                        <label>Tipo de documento:</label>
                        <select class="form-control" name="txttipodocumento" id="tipodocumento">
                            <?php foreach ($lista_tipo as $mostrar) { ?>
                            <option value="<?php echo $mostrar['id_tipo_doc']; ?>">
                                <?php echo $mostrar['descripcion']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Ingresar folio manualmente</label>
                        <!-- Default switch -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitches">
                            <label class="custom-control-label" for="customSwitches">Toggle this switch element</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-2">
                        <label>Folio:</label>
                        <div id="selectfolio"></div>
                    </div>
                    <div class="col-md-2">
                        <label>Fecha del oficio</label>
                        <input name="txtfecha_o" class="form-control" type="date">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <label>Remitente</label>
                        <input name="txtremitente" class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                        <label>Cargo</label>
                        <input name="txtcargo_r" class="form-control" type="text">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label>Asunto</label>
                        <textarea name="txtasunto" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <br>
                        <dd><input class="btn btn-primary btn-sm" type="submit" value="Enviar" id="envia"
                                name="envia" />
                        </dd>
                    </div>
                </div>
            </div>
        </form>
        <!--
        <ul>
            <li><a href="#">Documentos recibidos</a></li>
            <li><a href="#">Documentos turnados</a></li>
            <li><a href="#">Documentos papelera</a></li>
        </ul>
        -->
    </div>



    <script>
    $(document).ready(function() {

        $('#example').DataTable({
            responsive: true,
            "pagingType": "full_numbers",

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
            }
        });





        $('#toggle_f').click(function() {
            $('#toggle_f').toggleClass('active');
            $('#toggle').toggleClass('disabled');
            $('#overlay').toggleClass('disabled');
            $('#overlay2').toggleClass('active');
            $('#menu2').toggleClass('active');


        });


        $('#toggle').click(function() {
            $('#toggle').toggleClass('active');
            $('#toggle_f').toggleClass('disabled');
            $('#overlay2').toggleClass('disabled');
            $('#overlay').toggleClass('active');
            $('#menu').toggleClass('active');


        });

        $(".click2").click(function(e) {
            e.preventDefault();
            var data = $(this).attr("data-valor");
            localStorage.setItem("documento", data);
            console.log("El data enviado es:" + data);
            $(function() {
                console.log("Inicia");
                var textoBusqueda = data;
                if (textoBusqueda != "") {
                    $.post(
                        "../js/buscar_r.php", {
                            valorBusqueda: textoBusqueda
                        },
                        function(mensaje2) {
                            var c2 = document.querySelector("#resultadoBusqueda");
                            console.log("Es:" + textoBusqueda);
                            $("#resultadoBusqueda").html(mensaje2);
                        }
                    );
                } else {
                    $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
                }
            });
        });


    });
    </script>

    <script>
    var arr = [];
    var json = [];
    var json2 = [];
    var json3 = [];

    var ajaxOptions = {};
    ajaxOptions.data1 = {};


    var ajaxOptions2 = {};
    ajaxOptions2.data2 = {};

    $(function() {


        recargarLista();
        $('#tipodocumento').change(function() {
            recargarLista();
        });

        function recargarLista() {
            console.log("Preparando datos");
            console.log($('#tipodocumento').val());
            $.ajax({
                type: "POST",
                url: "../Model/gen_folio.php",
                data: "tipo=" + $('#tipodocumento').val(),
                success: function(r) {
                    console.log("Enviado exitosamente");
                    $('#selectfolio').html(r);
                }
            });
        }


        $('#direccion').select2();
        $('#tipo').select2();
        $('#estado').select2();
        $('#direccion').change(function() {

            ajaxOptions.data1 = $(this).val();
            console.log(JSON.stringify(ajaxOptions));
            console.log(Object.keys(ajaxOptions));

        });
        $('#fecha_o').change(function() {

            ajaxOptions2.data2 = $(this).val();
            console.log(JSON.stringify(ajaxOptions2));
        });
    });

    $('#formulario').submit(function(e) {
        e.preventDefault();


        //Select's Multiple
        var selectObject = document.getElementById("direccion");
        console.log(selectObject);
        for (var i = 0; i < selectObject.options.length; i++) {
            if (selectObject.options[i].selected == true) {
                var t = selectObject.options[i].value;
                json.push(t);
            }
        }

        var selectObject2 = document.getElementById("tipo");
        console.log(selectObject2);
        for (var j = 0; j < selectObject2.options.length; j++) {
            if (selectObject2.options[j].selected == true) {
                var t2 = selectObject2.options[j].value;
                json2.push(t2);
            }
        }

        var selectObject3 = document.getElementById("estado");
        console.log(selectObject3);
        for (var k = 0; k < selectObject3.options.length; k++) {
            if (selectObject3.options[k].selected == true) {
                var t3 = selectObject3.options[k].value;
                json3.push(t3);
            }
        }


        // Inputs date fechas
        var fecha_oi = document.getElementById("fecha_oi").value;
        console.log(fecha_oi);
        var fecha_of = document.getElementById("fecha_of").value;
        console.log(fecha_of);
        var fecha_li = document.getElementById("fecha_li").value;
        console.log(fecha_li);
        var fecha_lf = document.getElementById("fecha_lf").value;
        console.log(fecha_lf);
        var fecha_ri = document.getElementById("fecha_ri").value;
        console.log(fecha_ri);
        var fecha_rf = document.getElementById("fecha_rf").value;
        console.log(fecha_rf);




        console.log(JSON.stringify(json));
        console.log(JSON.stringify(json2));
        console.log(JSON.stringify(json3));
        $(function() {
            console.log("Inicia el envio de datos a filtros");
            console.log(Object.keys(json));
            /* if (Object.keys(json).length === 0) {
                 console.log(" No se puede iniciar Elemento vacio");
             } else {*/
            var tablad = document.querySelector("#tabla_r");
            tablad.style.display = "none";
            var pag = document.querySelector("#paginador");
            pag.style.display = "none";
            var tablaf = document.querySelector("#table2");
            tablaf.style.display = "block";
            var data_estado = JSON.stringify(json3);
            var data_tipo = JSON.stringify(json2);
            var data_direcciones = JSON.stringify(json);
            json = [];
            json2 = [];
            json3 = [];
            console.log(
                "Comprobacion Correcta elemento no vacio");

            $.post(
                "../Controller/filtros.php", {
                    valorEst: data_estado,
                    valorTip: data_tipo,
                    valorDir: data_direcciones,
                    valorFoi: fecha_oi,
                    valorFli: fecha_li,
                    valorFri: fecha_ri,
                    valorFof: fecha_of,
                    valorFlf: fecha_lf,
                    valorFrf: fecha_rf


                },
                function(mensaje) {
                    console.log(mensaje);
                    var f1 = document.querySelector('#contenido_tab_1');
                    console.log("Ubicacion Espacial:" + f1);
                    $('#contenido_tab_1').html(mensaje);
                }
            );
            //}
            $(function() {
                $('#click').click(function(e) {
                    e.preventDefault();
                    alert("Funciona");
                    console.log("Reconoce el clic");
                });
            });
        });


    });
    </script>

</body>
</body>

</html>