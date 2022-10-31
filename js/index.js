function get_windowMX() {
    x = Math.round(window.innerWidth * 0.50);
    return x;
}

function get_windowMY() {
    y = Math.round(window.innerHeight * 0.50);
    return y;
}


var logo = "img/LogoPC2.png";
var panel_c_h = $('#panel_p').css("height");
var panel_p_l = $('#panel_p').css("left");
var logo_left = $('#logo_img').css("left");


function print_screen() {
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






    if (window.innerWidth >= 800) {
        $('#logo_img').attr("src", logo);
        $('#logo_img').css("width", 700);
        //$('#logo_img').css("top", y1 / 5000);
        $('#panel_p').css("width", 500);
        $('#panel_p').css("height", 350);
        $('#top').css("background-color", "white");
    }


    if (window.innerWidth <= 988) {
        $('#logo_img').attr("src", logo);

        $('#fondo').css("background-color", '#f0f2f5');
        $('#panel_p').css("width", 500);
        $('#panel_p').css("height", 350);
    }

    if (window.innerWidth <= 800) {

        $('#logo_img').attr("src", "");
        $('#logo_img').attr("src", "img/logo_mn.png");
        $('#logo_img').css("width", 200);
        $('#logo_img').css("left", x1 * -0.15);
        $('#logo_img').css("top", y1 * -0.2);
        $('#top').css("background-color", "#727272");
        /*$('#top').animate({
            backgroundColor: "#727272"
        }, 1000);*/
        $('#fondo').css("background-color", '#049e46');
        $('#cc').css("padding-left", x1 / 3);
        $('#panel_p').css("left", x1 / -15);


    }
    if (window.innerWidth < 550) {
        $('#logo_img').css("left", x1 / 1000);
        $('#cc').css("padding-left", 30);
    }


    /*
if (window.innerWidth < 750) {
  

    swal({
        title: 'Pantalla pequeña!',
        text: 'Pantalla muy pequeña para usar todas las funciones del sistema, podra hacer uso solo del modo consulta',
        icon: 'warning',
        button: 'aceptar!',
    });
    
    //$('#panel_p').css("left",x1);
    $('#cc').removeClass("container");
    $('#cc').addClass("container-fluid");
    $('#cc').css("padding-left",x1 / 2);
 



}
*/

    /*
    if(window.innerHeight < 800)
    {
        $('.large').css("top",100);
    }else{
        $('.large').css("top",200);
    }
    */
}
$(document).ready(function() {
    print_screen();
    $(window).resize(function(e) {
        //console.log(e);
        print_screen();
    });

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        console.log('Esto es un dispositivo móvil');
    }

    function isMobile() {
        return (
            (navigator.userAgent.match(/Android/i)) ||
            (navigator.userAgent.match(/webOS/i)) ||
            (navigator.userAgent.match(/iPhone/i)) ||
            (navigator.userAgent.match(/iPod/i)) ||
            (navigator.userAgent.match(/iPad/i)) ||
            (navigator.userAgent.match(/BlackBerry/i))
        );
    }

    var disp = (isMobile());
    console.log(disp);
    if (disp == null) {
        swal("navegador normal");
    } else {
        swal("telefono movil");
        $("#content-dc").empty();
        $("#movile").css("display", "block");
    }


    $('#btn_log').click(function() {
        var usr = $('#usuario').val();
        var pass = $('#pass').val();
        if (usr == "" || pass == "") {
            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor llene ambos campos!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        } else {
            var data = new FormData();
            data.append('usr', usr);
            data.append('pass', pass);
            //alert(data);
            $.ajax({
                data: data,
                url: "Controller/login.php",
                type: "POST",
                processData: false,
                contentType: false,
                success: function(e) {
                    swal(e);
                    // var resp_serv = e;
                    //let res = resp_serv.replace(/['"]+/g, '');
                    //let url = 'View/' + res;
                    //console.log(url);
                    //var priv = e;
                    //alert(priv);
                    //alert(resp_serv);
                    //console.log(resp_serv);

                },
            });
        }
    });





    $('#modulo').change(function() {
        var modulo = $('#modulo').val();
        $.ajax({
            data: {
                'modulo': modulo
            },
            type: "POST",
            url: "Controller/gen_rol.php",
            success: function(message) {
                $("#rol-modulo").html(message)
            }
        });
    });



    $("#customSwitches").prop("checked", false);


    $("#customSwitches").change(function() {
        if ($('#customSwitches').prop('checked')) {
            swal("Modo nocturno activado!");
            //alert('Seleccionado');
            $('#fondo').css('background-color', '#282828');
            $('.form').css('background-color', '#777777');
            $('.input-name').css('color', '#fff');
            $('.input-pass').css('color', '#fff');
            $('#pass_ol').css('color', '#fff');


        } else {
            swal("Modo nocturno desactivado!");
            $('#fondo').css('background-color', '#f0f2f5');
            $('.form').css('background-color', '#fff');
            $('.input-name').css('color', 'teal');
            $('.input-pass').css('color', 'teal');
            $('#pass_ol').css('color', 'blue');


        }

    });




    $('#reg').click(function() {
        $('#myModal').modal('show');

    });


    $('#pass_ol').click(function() {
        $('#Modalfp').modal('show');
    });

    $('#btn-acceso').click(function() {
        var email = $('#email-p').val();
        //alert(email);
        if (email == "") {
            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'Al parecer no todos los campos estan llenos!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        } else {
            $.ajax({
                data: {
                    'email': email
                },
                url: "Controller/res_pass.php",
                type: "POST",
                success: function(e) {
                    var resp = e;
                    //alert(e);
                    if (resp == 0) {
                        swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Esa direccion de correo electronico no esta registrado!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                    } else {
                        swal({
                            title: "Solicitud aceptada",
                            text: "Se enviara su usuario y contraseña al correo que registro",
                            icon: "success",
                            type: "success"
                        })
                    }
                },
            })
        }
    });

    $('#btn-registro').click(function() {

        var nombre = $('#txtnombre').val();
        var apellido = $('#txtapellido').val();
        var correo = $('#txtcorreo').val();
        var direccion = $('#txtdireccion').val();
        var modulo = $('#modulo').val();
        var rol = $('#rol').val();
        var genero = $('input:radio[name=genero]:checked').val();
        var folio_cpu = $('#folio_cpu').val();
        var num_e = $('#num_e').val();
        //alert(direccion);
        //alert(modulo + rol + genero);

        if (nombre == "" || apellido == "" || correo == "" || direccion == "" || modulo ==
            0 || genero == null || folio_cpu == null) {
            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'Al parecer no todos los campos estan llenos!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        } else {
            //alert(direccion);
            var form_data = new FormData();
            form_data.append('nombre', nombre);
            form_data.append('apellido', apellido);
            form_data.append('correo', correo);
            form_data.append('direccion', direccion);
            form_data.append('modulo', modulo);
            //form_data.append('rol', rol);
            form_data.append('genero', genero);
            form_data.append('folio', folio_cpu);
            form_data.append('num_e', num_e);

            console.log(JSON.stringify(form_data));
            //alert(form_data);
            $.ajax({
                data: form_data,
                url: "Model/registrar.php",
                type: "POST",
                contentType: false,
                processData: false,
                success: function(r) {
                    //swal(r);

                    swal({
                        title: "Registro exitoso",
                        text: "Se enviara su usuario y contraseña al correo que registro",
                        icon: "success",
                        type: "success"

                    });
                }
            });



        }




        /*
       
        */
    });

    $("#example").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        console.log('iniciando');
        console.log("Este es el id" + data);




        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log("es: " + textoBusqueda);
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").html("<img id='loading_document' src='../img/loading_p2.gif'>");
            setTimeout(function() {
                if (textoBusqueda != "") {
                    $.post(
                        "../Model/vista_documento.php", {
                            valorBusqueda: textoBusqueda
                        },
                        function(mensaje2) {
                            var c2 = document.querySelector(
                                "#resultadoBusqueda");
                            //console.log("Es:" + textoBusqueda);
                            $("#resultadoBusqueda").empty();
                            $("#resultadoBusqueda").html(mensaje2);
                        }
                    );
                } else {
                    $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
                }
            }, 900);

            //alert(textoBusqueda);

        });


        //$("#text").val(textoRenglon);
        //alert(renglon);


        /////////////////////////////////////////////////////////////////////


    });

    ///////////////////////////////////////////////////////////////////////




    $("#example_turnos_areas").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        console.log('iniciando');
        console.log(data);

        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log(textoBusqueda);

            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../Model/vista_documento_as.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(mensaje2) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        //console.log("Es:" + textoBusqueda);
                        $("#resultadoBusqueda").html(mensaje2);
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });





    $("#example_as").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 0:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        //alert(id);
        var data = id;
        //alert(data);
        console.log('iniciando');
        console.log(data);

        //alert("paso 2");
        $(function() {
            var textoBusqueda = data;
            console.log(textoBusqueda);

            //alert(textoBusqueda);
            if (textoBusqueda != "") {
                $.post(
                    "../Model/vista_documento_as.php", {
                        valorBusqueda: textoBusqueda
                    },
                    function(mensaje2) {
                        var c2 = document.querySelector(
                            "#resultadoBusqueda");
                        //console.log("Es:" + textoBusqueda);
                        $("#resultadoBusqueda").html(mensaje2);
                    }
                );
            } else {
                $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
            }
        });


        //$("#text").val(textoRenglon);
        //alert(renglon);
    });

});