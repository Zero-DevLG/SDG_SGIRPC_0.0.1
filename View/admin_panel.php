<?php
session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location: ../index.php");
}
//include("../Model/navBar.php");
//$bar = new navBaradmin();
//$bar->construye();
$accionCancelar = "disabled";
$area_usr = $_SESSION['area'];
$direccion_usr = $_SESSION['direccion'];
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/estilos_max.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/main2.js"></script>
    <script src="../js/paginator.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
    function mostrar_Loading() {
        document.getElementById("panel").style.display = "block";
        //document.getElementById("panel").fadeIn(1500);
        document.getElementById("loading_p").style.display = "none";
    }
    $(document).ready(function() {

        setInterval(mostrar_Loading, 1800);

    });
    </script>

    <title>Panel de Administracion</title>
</head>
<div id="loading_p"><img src="../img/loader26.gif" width="55%" height="65%" style="display:block"></div>

<div id="panel" style="display: none">

    <body>


        <div id="navBar_panel">
            <nav class="navbar navbar-expand-md navbar-dark bg-success sticky-top">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapse">
                    <a class="navbar-brand"><img src="../img/bar_pc2.png" width="420px" height="50px"></a>
                    <span class="navbar-text">
                        <h5>Plataforma de Control y Gestion de Documentos</h5>
                    </span>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../View/admin_panel.php">
                                <h6>| <img src="../img/home2.png" width="25px" /> Inicio |</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Controller/cerrar_sesion.php">
                                <h6>| <img src="../img/logout2.png" width="25px" /> Cerrar Sesion |</h6>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#"><img id="notificaciones" src="../img/nt1.png"
                                    width="25px" /></a>
                        </li>
                        <li id="foto">
                            <a class="nav-link"><img id="img_usr" width="25px" height="25" style="border-radius: 50px;"
                                    src="../imagenes/<?php echo $_SESSION['foto']; ?>" /></a>
                        </li>
                    </ul>


                </div>
            </nav>
        </div>

        <div id="contenido_ventanas">
            <div id="box1">
                <a id="target" href="empleado.php" title="Control de Acceso"><img class="desaturada" id="usr_p"
                        src="../img/cuenta_user_3.jpg" /></a>
                <div class="effect">

                    <div class="mask"></div>
                </div>
            </div>

            <div id="box2">

                <div class="effect">
                    <a id="target2" href="admin_equipos.php" title="ajustes generales"><img
                            src="../img/configuraciones_2.jpg" /></a>
                    <div class="mask"></div>
                </div>
            </div>

            <div id="box3">

                <div class="effect">
                    <a id="target3" href="equipos.php" title="Administrar Controles "><img
                            src="../img/controles_2.jpg" /></a>
                    <div class="mask"></div>
                </div>
            </div>

            <div id="box4">

                <div class="effect">
                    <a href="documentos_l.php" id="documents_target" title="Administrar Documentos"><img
                            src="../img/documentos_3.jpg" /></a>
                    <div class="mask"></div>
                </div>
            </div>

            <div id="box5">

                <div class="effect">
                    <a id="target_link" href="c_equipos.php" title="Consultar logs"><img id="target_usr"
                            src="../img/logs.jpg" /></a>
                    <div class="mask"></div>
                </div>
            </div>

            <div id="box6">

                <div class="effect">
                    <a href="c_equipos.php" title="Reportes,Graficas"><img id="img_bis" src="../img/reportes.jpg" /></a>
                    <div class="mask"></div>
                </div>
            </div>

            <div id="box7">

                <div class="effect">
                    <a href="notificaciones.php" title="Reportes,Graficas"><img src="../img/soporte.jpg" /></a>
                    <div class="mask"></div>
                </div>
            </div>




        </div>



        <?php if ($_SESSION["tipo_user"] == "registro") { ?>

        <script>
        document.getElementById("usr_p").src = "../img/documentos_externos.jpg";
        document.getElementById("target_usr").src = "../img/historico_3.jpg";
        document.getElementById("img_bis").src = "../img/bis.jpg";
        document.getElementById("target_link").title = "Consultar documentos finalizados";
        document.getElementById("target_link").href = "historico.php";
        document.getElementById("documents_target").href = "tabla_consulta.php";


        document.getElementById("target").href = "d_e.php";

        document.getElementById("usr_p").class = "desaturada";
        document.getElementById("usr_p").title = "Administrar documentos externos";



        document.getElementById("target2").href = "#";
        document.getElementById("target2").title = "Contenido no disponible";

        document.getElementById("target3").href = "#";
        document.getElementById("target3").title = "Contenido no disponible";
        </script>
        <?php } ?>

    </body>
    <iframe id="tabla_ajax" src="tabla1.php" frameborder="0" width="400px" height="500px"></iframe>

    <footer id="footer" class="section footer-classic context-dark bg-image"
        style="background: #2d3246; color: white; width:100%;">
        <div id="container">
            <div class="row row-30">
                <div class="col-md-4 col-xl-5">
                    <div class="pr-xl-4"><a class="brand" href="#"><img class="brand-logo-light"
                                src="../img/iconos/logo_cons.png" alt="" width="150" height="70"
                                srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>

                        <p>Sistema de control y seguimiento vehicular, desarrollo independiente por
                            Luis Gabriel
                            Verdiguel Carrillo para la Secretaria de Gestion Integral de Riesgos y Proteccion Civil.</p>
                        <!-- Rights-->

                        <p class="rights"><span>©  </span><span
                                class="copyright-year">2020</span><span> </span><span>A/Z</span><span>. </span><span>Todos
                                los derechos reservados.</span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Contactos</h5>
                    <dl class="contact-list">
                        <dt>Direccion:</dt>
                        <dd>Abraham Gonzales 67 , Colonia Juarez</dd>
                    </dl>
                    <dl class="contact-list">
                        <dt>email:</dt>
                        <dd><a href="mailto:#">lgverdiguelc@sgirpc.cdmx.gob.mx</a></dd>
                    </dl>
                    <dl class="contact-list">
                        <dt>Telefono:</dt>
                        <dd><a href="tel:#">5584513718</a>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-4 col-xl-3">
                    <h5>Links</h5>
                    <ul class="nav-list">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>


    <script src="../js/prueba.js"></script>
</div>


</html>