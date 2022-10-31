<?php
    //session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="../css/error.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="head">
        <h4>Sistema no disponible</h4>
    </div>

    <div id="main">
        <h2>El sistema no se encuentra disponible, puede deberse a un error o a un mantenimiento de la plataforma</h2>
        <img src="../img/iconos/error_500.png" alt="">
    </div>
</body>
</html>


<script>
    localStorage.clear();
    setTimeout(() => {
        $(window).attr('location','/SGIRPC_US_dev_2022/index.php');
    }, 1000);
</script>