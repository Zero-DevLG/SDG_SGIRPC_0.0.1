'use strict'


$(document).ready(function () {
    (function ($) {
        var timeout;
        $(document).on('mousemove', function (event) {
            if (timeout !== undefined) {
                window.clearTimeout(timeout);
            }
            timeout = window.setTimeout(function () {
                //Creas una funcion nueva para jquery 
                $(event.target).trigger('mousemoveend');
            }, 600000); //determinas el tiempo en milisegundo aqui 5 segundos
        });
    }(jQuery));
    $(document).on('mousemoveend', function () { //agregas la nueva funcion creada, puede ser una clase o un id
        swal("Se procedera a cerrar su sesion por un largo periodo de inactividad", {
            buttons: {
                catch: {
                    text: "Aceptar",
                    value: "catch",
                },
            },
        })
            .then((value) => {
                switch (value) {
                    case "catch":

                        swal("Vuelva a iniciar sesion");
                        setTimeout(() => {
                            $(location).attr('href', '../Controller/cerrar_sesion.php');
                        }, 2000)
                        break;
                }
            });

    });
});