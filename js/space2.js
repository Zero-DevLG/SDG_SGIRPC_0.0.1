function get_windowMX() {
    x = Math.round(window.innerWidth * 0.50);
    return x;
}

function get_windowMY() {
    y = Math.round(window.innerHeight * 0.50);
    return y;
}

function print_screen() {

    $('#rebuild').show();

    x1 = get_windowMX();
    y1 = get_windowMY();
    w = $('#panel_p').css("height");
    l = $('#panel_p').css("left");
    // $('#logo_img').css("top",y1 * -0.5);
    // $('#logo_img').css("left",x1 * -0.2);
    //$('#logo_img').css("left",x1 / 3);
    //$('#btn_nocturno').css("left",x);
    //$('#pr').css("width",x);
    $('#info_data').css("top", y1 * 0.4);
    $('#info_data').css("left", x1 * 0.1);
    $('#logo_img').css("top", y1 * -0.2);
    $('#logo_img').css("left", x1 * -0.1);



    $('#temp-screen').html("X: " + window.innerWidth + " -- Y: " + window.innerHeight +
        "--- x1:" + x1 + "-- y1: " + y1);

    if (window.innerHeight >= 900 && window.innerWidth >= 1500) {
        $('#formu').hide();
        //location.reload();
        localStorage.setItem("window", 1);
        $('#body_nav').animate({
            width: "60px"
        });
        $('#body_nav').animate({
            height: "150px"
        });
        $('#body_nav').animate({
            top: "320px"
        });
        $('#body_nav').animate({
            left: "10px"
        });

        $('#body_nav').animate({
            backgroundColor: "white"
        }, 700);

        setTimeout(() => {
            $('#dia_actual').animate({
                left: "5%"
            }, 1500)
            $('#dia_actual').animate({
                width: "90%"
            }, 1500)
        }, 1500)
        $('#contenido_navi').hide(1);
        $('#encabezado_p').animate({
            backgroundColor: "white"
        }, 1000);
        $('#encabezado_p').animate({
            height: "80px"
        }, 1000);
        $('#iframeI').animate({
            top: "91px"
        }, 1000);
        $('#iframeD').animate({
            top: "91px"
        }, 1000);
        $('#encabezado_p').animate({
            left: "90px"
        }, 800);
        $('#encabezado_p').animate({
            width: "94%"
        }, 800);
        $('#iframeI').animate({
            left: "85px"
        }, 200);
        $('#iframeI').animate({
            height: "85%"
        }, 1000);
        $('#iframeI').animate({
            width: "50%"
        }, 200);
        $('#iframeD').animate({
            height: "85%"
        }, 1300);
        $('#iframeD').animate({
            width: "42%"
        }, 1300);
        $('#iframeD').animate({
            left: "57%"
        }, 1300);
        setTimeout(() => {
            $('#btn-content').show(1000);
            $('#btn-content').animate({
                top: "95px"
            }, 500);
            $('#btn-content').animate({
                height: "200px"
            }, 500);
            $('#btn-content').animate({
                left: "10px"
            }, 500);
            $('#body_nav').show(1000);

        }, 1000)

        setTimeout(() => {
            $('#logout').show(500);
            $('#logout').animate({
                left: "75%"
            }, 700);
            $('#home').animate({
                left: "680"
            }, 700);
            $('#home').animate({
                top: "25px"
            }, 700);
            $('#doc').animate({
                top: "23px"
            }, 700);
            $('#doc').animate({
                left: "735px"
            }, 700);
            $('#bitacora').animate({
                top: "23px"
            }, 700);
            $('#bitacora').animate({
                left: "785px"
            }, 700);
            $('#bis').animate({
                top: "22px"
            }, 700);
            $('#bis').animate({
                left: "835px"
            }, 700);

            $('#logo').attr("src", "../img/LogoPC2.png");
            $('#logo').animate({
                left: "30px"
            }, 700);
            $('#logo').animate({
                width: "600px"
            }, 700);
            $('#logo').animate({
                height: "68px"
            }, 700);
            $('#logo').animate({
                top: "10px"
            }, 700);
        }, 1200)

        $('#contenido_navi').show(1);





    }

    if (window.innerHeight <= 780 || window.innerWidth <= 1024) {
        $('#formu').hide();
        swal({
            title: 'Resolucion insuficiente!',
            text: 'Requerimientos minimos: 1028px X 800px',
            icon: 'warning',
            button: 'aceptar!',
        });
        location.href = "../Controller/cerrar_sesion.php";
    }


    if (window.innerHeight <= 800 || window.innerWidth <= 1400) {


        localStorage.setItem("window", 2);
        //$('#dia_actual').hide();

        //$('#img_usr_2').show(1200);
        //$('#reg_2').show(1200);
        //$('#img_null').hide(500);
        $('#contenido_navi').hide(1);
        $('#encabezado_p').animate({
            backgroundColor: "#545454"
        }, 1000);
        $('#encabezado_p').animate({
            width: "7%"
        }, 1000);
        $('#encabezado_p').animate({
            left: "0.3%"
        }, 800);

        $('#encabezado_p').animate({
            height: "93%"
        }, 1000);
        $('#logout').show(500);
        $('#logout').animate({
            left: "30%"
        }, 700);
        $('#home').animate({
            left: "30%"
        }, 700);
        $('#home').animate({
            top: "20%"
        }, 700);
        $('#doc').animate({
            top: "32%"
        }, 700);
        $('#doc').animate({
            left: "30%"
        }, 700);
        $('#bitacora').animate({
            top: "45%"
        }, 700);
        $('#bitacora').animate({
            left: "30%"
        }, 700);
        $('#bis').animate({
            top: "55%"
        }, 700);
        $('#bis').animate({
            left: "30%"
        }, 700);

        $('#logo').attr("src", "");
        $('#logo').animate({
            left: "-10px"
        }, 700);
        $('#logo').animate({
            width: "5%"
        }, 700);
        $('#logo').animate({
            height: "200px"
        }, 700);
        $('#logo').animate({
            top: "90%"
        }, 700);
        setTimeout(() => {
            $('#dia_actual').animate({
                left: "10%"
            }, 1500)
            $('#dia_actual').animate({
                width: "88%"
            }, 1500)
        }, 1500)


        $('#contenido_navi').show(1);
    }



    /*
        if (window.innerWidth <= 1280) {
        
            //$('#iframeI').css("width","40%");
            $('#iframeI').animate({
                width: "60%"
            }, 1200);
            $('#iframeI').animate({
                height: "80%"
            }, 1200);
            $('#iframeD').animate({
                left: "68%"
            }, 800);
            $('#iframeD').animate({
                height: "80%"
            }, 1200);
            $('#iframeD').animate({
                width: "30%"
            }, 800);
            $('#iframeI').css("height", "80%");
            $('#iframeI').css("text-aline", "center");
        
        }*/
    setTimeout(() => {
        $('#rebuild').hide();
    }, 5500)

    if (localStorage.getItem("window") == 2) {
        $('#resize').show();
    } else {
        $('#resize').hide();
    }

}




$(document).ready(function() {
    //alert("Hola")
    print_screen();

    $(window).resize(function() {
        if (this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
        }, 500);

    });

    $(window).bind('resizeEnd', function() {
        print_screen();
    });
});