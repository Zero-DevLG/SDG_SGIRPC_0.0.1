$(document).ready(function(){
    $('#home').hover(function() {

        //alert('Hola mundo');

        var c_linea = $('#linea_menu2').position();
        //alert(JSON.stringify(c_linea));

        $('#linea_menu2').animate({
            left: "+=60px"
        }, 50);
        $('#home').attr("src", "../img/home2_select.png");


    },
    // function() {

    //     var c_linea = $('#linea_menu2').position();
    //     //alert(JSON.stringify(c_linea));
    //     if (c_linea.left < -1100) {
    //         //alert("supero");
    //     } else {
    //         //alert(c_linea.left);
    //         $('#linea_menu2').animate({
    //             left: "-=60px"
    //         }, 50);
    //         $('#home').attr("src", "../img/home2.png");

    //     }


    // }
);

$('#doc').hover(function() {
        //alert('Hola mundo');
        var c_linea = $('#linea_menu2').position();
        //alert(JSON.stringify(c_linea));

        $('#linea_menu2').animate({
            left: "+=110px"
        }, 50);
        $('#doc').attr("src", "../img/doc_select.png");

    },
    function() {
        var c_linea = $('#linea_menu2').position();
        //alert(JSON.stringify(c_linea));

        $('#linea_menu2').animate({
            left: "-=110px"
        }, 50);
        $('#doc').attr("src", "../img/doc.png");



    }
);


$('#bitacora').hover(function() {
        //alert('Hola mundo');
        var c_linea = $('#linea_menu2').position();
        //alert(JSON.stringify(c_linea));

        $('#linea_menu2').animate({
            left: "+=160px"
        }, 50);
        $('#bitacora').attr("src", "../img/bitacora_select.png");

    },
    function() {
        var c_linea = $('#linea_menu2').position();
        //alert(JSON.stringify(c_linea));

        $('#linea_menu2').animate({
            left: "-=160px"
        }, 50);
        $('#bitacora').attr("src", "../img/bitacora.png");

    }
);

$('#bis').hover(function() {
    //alert('Hola mundo');
    var c_linea = $('#linea_menu2').position();
    //alert(JSON.stringify(c_linea));

    $('#linea_menu2').animate({
        left: "+=210px"
    }, 50);
    $('#bis').attr("src", "../img/iconos/bis_selected.png");

},
function() {
    var c_linea = $('#linea_menu2').position();
    //alert(JSON.stringify(c_linea));

    $('#linea_menu2').animate({
        left: "-=210px"
    }, 50);
    $('#bis').attr("src", "../img/iconos/BIS.png");

}
);

$('#logout').hover(function() {
        //alert('Hola mundo');
        var c_linea = $('#linea_menu2').position();
        //alert(JSON.stringify(c_linea));

        $('#linea_menu2').css("border-bottom", "2px solid red");
        $('#linea_menu2').animate({
            left: "+=800px"
        }, 50);
        $('#logout').attr("src", "../img/logout_select.png");

    },
    function() {
        var c_linea = $('#linea_menu2').position();
        $('#linea_menu2').css("border-bottom", "2px solid  #2479e9");
        //alert(JSON.stringify(c_linea));

        $('#linea_menu2').animate({
            left: "-=800px"
        }, 50);
        $('#logout').attr("src", "../img/logout4.png");

    }
);
});