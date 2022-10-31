<?php
    error_reporting(E_ERROR);
?>


<?php if($_SESSION['tipo_rol'] == 1){ ?>
    <body>
    <script src="../js/jquery-ui.js"></script>
    <div id="body_nav">
        <a href="#"><img src="../img/user_d.png" id="img_usr" title="Informacion del usuario" alt=""></a>
        <a href="#"><img src="../img/iconos/close.png" id="close" title="cerrar" alt=""></a>
        <div id="data_info">

        </div>
        <a href="#" id="logs">Prueba</a>
        
    </div>
</body>
<?php } ?>

<?php if($_SESSION['tipo_rol'] == 3){ ?>
    <body>
    <script src="../js/jquery-ui.js"></script>
    <div id="body_nav">
        <a href="#"><img src="../img/user_d.png" id="img_usr" title="Informacion del usuario" alt=""></a>
        <a href="#"><img src="../img/iconos/close.png" id="close" title="cerrar" alt=""></a>
        <div id="data_info">

        </div>
    </div>
</body>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>


<script>

$('#logs').click(()=>{
    console.log("Prueba Modal");
    $('#exampleModal').modal('show');
})



$('#img_usr').click(function() {

    $('#body_nav').animate({
        width: "1200px"
    });
    $('#body_nav').animate({
        height: "65%"
    });

    $('#body_nav').animate({
        backgroundColor: "#43464d"
    }, 700);

    //$('#body_nav').css("background-color", "#43464d");

    $('#img_usr').animate({
        top: "10%"
    }, 1500);

    $('#close').animate({
        left: "95%"
    })
    $('#close').show(2000);

    /////Consulta AJAX
    $.ajax({
        type: 'POST',
        url: '../Controller/usr_info.php',
        data: '',
        contentType: false,
        processData: false,
        success: function(e) {
            $('#data_info').empty()
            setTimeout(() => {
                $('#data_info').html(e)
            }, 1200);

        },
    });

    $.ajax({
        type: 'POST',
        url: '../Controller/usr_info_dir.php',
        data: '',
        contentType: false,
        processData: false,
        success: function(e) {
            $('#data_info').empty()
            setTimeout(() => {
                $('#data_info_dir').html(e)
            }, 1200);

        },
    });

    


});

$('#close').click(function() {

    if (localStorage.getItem("window") == 2) {
        $('#data_info').empty()
        $('#body_nav').animate({
        width: "60px"
         },200);
        $('#body_nav').animate({
            height: "60px"
        }, 500);
        $('#body_nav').animate({
            top: "25%"
        }, 500);
       
       
         $('#body_nav').animate({
            left: "1.5%"
        }, 500);
        $('#body_nav').animate({
        backgroundColor: "white"
        }, 200);

       
    }else{
        $('#body_nav').animate({
        width: "60px"
    });
    $('#body_nav').animate({
        height: "150px"
    });

    $('#body_nav').animate({
        backgroundColor: "white"
    }, 700);

    $('#close').hide();
    $('#close').animate({
        left: "5px"
    })
    $('#data_info').empty()
    }
    


})
</script>