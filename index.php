<?php
    session_start();
    if(isset($_SESSION['tipo_rol']))
    {
        switch($_SESSION['tipo_rol'])
        {
                case 1:
                    header("Location:http://localhost/SGIRPC_US_dev_2022/View/doc.php");
                break;
                case 9:
                    header("Location:http://localhost/SGIRPC_US_dev_2022/View/doc.php");
                break;
                case 7:
                    header("Location:http://localhost/SGIRPC_US_dev_2022/View/doc_dir.php");
                break;
                case 6:
                    header("Location:http://localhost/SGIRPC_US_dev_2022/View/doc_dep.php");
                break;
                case 8:
                    header("Location:http://localhost/SGIRPC_US_dev_2022/View/doc_cj.php");
                break;
        }
    }else{
        session_destroy();
    }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina de inicio</title>






    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="icon" href="img/iconos/favicon.jpg" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css?v=<?php echo (rand()); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/index.js"></script>

</head>
<?php include('Model/modals.php');
    require('Model/Consultas.php');
?>

<body>
<div id="top"></div>
<div id="bottom"></div>

<div class="container-fluid">
        <div class="row align-content-lg-end">
            <div class="col-lg-12">
                <div class="custom-control custom-switch" id="btn_nocturno">
                    <input type="checkbox" class="custom-control-input" id="customSwitches" checked>
                    <label class="custom-control-label" for="customSwitches">Modo Nocturno</label>
                </div>
            </div>
        </div>
    </div>

<div id="info_data">
<div class="container-fluid">
    <div class="row">
    <div style="color: white;" class="col align-self-start"></div>
    <div style="color: white;" class="col align-self-center">
    <img src="img/LogoPC2.png" id="logo_img" alt="">
    </div>
    <div style="color: white;" class="col align-self-end"></div>
    </div>
    </div>

<div class="container-fluid">
    <div class="row">
    <div style="color: white;" class="col align-self-start"></div>
    <div style="color: white;" class="col align-self-center">
    <div id="panel_p">
                        <div class="form">
                            <form action="./Controller/login.php" method="POST">
                                <input type="text" name="login" class="input-name" required>
                                <label class="lbl-nombre" id="lbl-nombre">
                                    <span class="text-nomb">
                                        Usuario
                                    </span>
                                </label>


                                <input type="password" name="password" class="input-pass" required>
                                <label class="lbl-pass" id="lbl-pass">
                                    <span class="text-pass">
                                        Contraseña
                                    </span>
                                </label>

                                <p class="center"><input id="btn_log" class="btn  btn-primary" type="submit"
                                        value="Iniciar Sesion">
                                    <br>


                                    <label id="borde_inferior"></label>

                                    <!-- <a id="pass_ol" href="#">¿Olvidaste tu contraseña?</a> -->

                                <p class="center"><input id="btn_log" class="btn  btn-primary" type="submit"
                                        value="Iniciar Sesion">
                            </form>
                            <label id="borde_inferior"></label>
                            <!-- <a id="pass_ol" href="#">¿Olvidaste tu contraseña?</a> -->
                        </div>

                        <!-- <button class="btn btn-success btn-sm" href="#" id="reg">
                            Registrarse
                        </button> -->


                    </div>
    </div>
    <div style="color: white;" class="col align-self-end"></div>
  </div>
</div>


</div>
    
 

 




   
                   
                               
     

    <!--
    <div class="custom-control custom-switch" id="btn_nocturno">
        <input type="checkbox" class="custom-control-input" id="customSwitches" checked>
        <label class="custom-control-label" for="customSwitches">Modo Nocturno</label>
    </div>

    <div id="contenido_izquierda">
        <img src="img/LogoPC2.png" alt="">

        <h3>
            PSI (Plataforma de Servicios Informaticos).
        </h3>

    </div>
    <div id="panel_p">
        <div class="form">



            <form action="./Controller/login.php" method="POST">
                <input type="text" name="login" class="input-name" required>
                <label class="lbl-nombre" id="lbl-nombre">
                    <span class="text-nomb">
                        Usuario
                    </span>
                </label>


                <input type="password" name="password" class="input-pass" required>
                <label class="lbl-pass" id="lbl-pass">
                    <span class="text-pass">
                        Contraseña
                    </span>
                </label>

                <p class="center"><input id="btn_log" class="btn  btn-primary" type="submit" value="Iniciar Sesion">
                    <br>


                    <label id="borde_inferior"></label>

                    <a id="pass_ol" href="#">¿Olvidaste tu contraseña?</a>

                <p class="center"><input id="btn_log" class="btn  btn-primary" type="submit" value="Iniciar Sesion">
            </form>
            <label id="borde_inferior"></label>

            <a id="pass_ol" href="#">¿Olvidaste tu contraseña?</a>



        </div>

        <button class="btn btn-success btn-sm" href="#" id="reg">
            Registrarse
        </button>


    </div>
-->
    <div id="temp-screen">

    </div>

    <div id="movile">
        <img src="img/iconos/-.png" alt="">
        <h4>
            Lo sentimos estamos trabajando en una version para moviles,
            que permita hacer uso adecuado de la plataforma.
        </h4>

    </div>

</body>

</html>






<!--
<footer id="footer" class="section footer-classic context-dark bg-image"
    style="background: #2d3246; color: white; width:100%;">
    <div id="container">
        <div class="row row-30">
            <div class="col-md-4 col-xl-5">
                <div class="pr-xl-4"><a class="brand" href="#"><img class="brand-logo-light"
                            src="img/iconos/logo_cons.png" alt="" width="150" height="70"
                            srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>

                    <p>Sistema de control y seguimiento vehicular, desarrollo independiente por
                        Luis Gabriel
                        Verdiguel Carrillo para la Secretaria de Gestion Integral de Riesgos y Proteccion Civil.</p>
                    

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

</html>

-->