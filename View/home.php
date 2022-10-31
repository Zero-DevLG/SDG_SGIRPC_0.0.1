<?php
session_start();
include("../Model/Conexion.php");
include("../Model/Consultas.php");

?>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/navi.css?v=<?php echo (rand()); ?>">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/toastr.min.css">
    <link rel="stylesheet" href="../css/dropzone.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/navi.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css?v=<?php echo (rand()); ?>">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/toastr.min.js"></script>
    <script src="../js/dropzone.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

</head>

<body background="../img/fondo_p2.jpg">
    <?php include("../Model/navi.php"); ?>

    <div id="container-home">
    <input type="hidden" id="usr" value="<?php echo $_SESSION['id_empleado']; ?>">
        <div id="modules_sys">
            <h3>Mis modulos:</h3>

            <a id="link_ti" target="blank" href="http://162.214.50.170:9992/mesa_ayuda/index.php"><img id="b_ti" src="../img/banners/ti_banner2.jpg" alt=""></a>
            
            
            <a id="link_ti" href="#"><img id="b_doc" src="../img/iconos/banner_doc.jpg" alt=""></a>

            <a id="link_ti" href="http://162.214.50.170:9800/sgirpc_vehicle/View/vehicle.php"  target="blank"><img id="b_car" src="../img/iconos/banner_car.jpg" alt=""></a>

            <a id="link_ti" target="blank"  href="http://162.214.50.170:9992/mesa_ayuda/scp/login.php"><img id="b_root" src="../img/iconos/banner_admin.jpg" alt=""></a>
            
        </div>

    </div>


</body>

<script>
    function ObtenerJson(json) {
    //json = JSON.stringify(json)
    var parsed = JSON.parse(json, 0, 1, 2);
    var arr = [];
    for (var x in parsed) {
        arr.push(parsed[x]);
    }
    return arr;
    //console.log(arr);
}


        var usr;
        var tic,doc,v,root;
        usr = $('#usr').val();
    function get_permits(){
        $.ajax({
        type: 'POST',
        url: '../Controller/permits.php',
        data: {'usr':usr},
        success: function(data){
            console.log(data);
           data_j = ObtenerJson(data);
            console.log(data_j);
            tic = data_j[0];
            doc = data_j[1];
            v = data_j[2];
            root = data_j[3];
        },
        });
    }

    $(document).ready(function(){
        get_permits();
        //alert(usr);
        //alert(tic,doc,v,root);

        $('#b_root').hover(function(){
            if(root == 0){
                $('#b_root').attr("src","../img/iconos/banner_admin_close.jpg")
            }else{
                $('#b_root').attr("src","../img/iconos/banner_admin_open.jpg")
            }
            
        }, function(){
            $('#b_root').attr("src","../img/iconos/banner_admin.jpg")
        });

        $('#b_doc').hover(function(){
            if(doc == 0){
                $('#b_doc').attr("src","../img/iconos/banner_doc_close.jpg")
            }else{
                $('#b_doc').attr("src","../img/iconos/banner_doc_open.jpg")
            }
            
        }, function(){
            $('#b_doc').attr("src","../img/iconos/banner_doc.jpg")
        });

        $('#b_car').hover(function(){
            if(v == 0){
                $('#b_car').attr("src","../img/iconos/banner_car_close.jpg")
            }else{
                $('#b_car').attr("src","../img/iconos/banner_car_open.jpg")
            }
            
        }, function(){
            $('#b_car').attr("src","../img/iconos/banner_car.jpg")
        });
        $('#b_ti').hover(function(){
            if(tic == 0){
                $('#b_ti').attr("src","../img/iconos/ti_banner_close.jpg")
            }else{
                $('#b_ti').attr("src","../img/iconos/ti_banner_open.jpg")
            }
            
        }, function(){
            $('#b_ti').attr("src","../img/banners/ti_banner2.jpg")
        });
        
        

        $("#b_ti").click(function(){
            if(tic == 0){
                swal("No tienes permisos para usar este modulo");
            }else{
               
            }    
        });
        
        $("#b_doc").click(function(){
            if(doc == 0){
                swal("No tienes permisos para usar este modulo");
            }else{
             
            }     
        });

        $("#b_car").click(function(){
            if(v == 0){
                swal("No tienes permisos para usar este modulo");
            }else{
                
            }     
        });


    })
</script>