var usr, usr2, doc, data_info2, estatus, z1, estate, id;
var i, j;
var data1 = [];
var data_info_t = [];

//notificaciones registro y perdidas

function getLastUsr() {




    //get_data_turn();
    $.ajax({
        type: 'POST',
        url: '../Controller/end_usr.php',
        data: '',
        success: function(e) {
            //alert(e);
            //alert(e);
            localStorage.setItem("doc", e);
            //alert(localStorage.getItem("doc"));
        },
    });
}



function ObtenerJson(json) {
    //json = JSON.stringify(json)
    var parsed = JSON.parse(json);
    var arr = [];
    for (var x in parsed) {
        arr.push(parsed[x]);
    }
    return arr;
    //console.log(arr);
}

function get_data_notify(data) {
    var data1 = [];
    var data_info2 = [];
    let data_last = parseInt(localStorage.getItem("doc"));
    let rep = data - data_last;
    let data_send = data_last;
    for (i = 0; i < rep; i++) {
        data_send += 1;
        //alert(data_send);

        $.ajax({
            type: 'POST',
            url: '../Controller/reg_usr.php',
            data: { 'data': data_send },
            success: function(data_info) {
                //console.log(JSON.parse(data_info));
                //data_info2 = JSON.parse(data_info);
                console.log("HOLA");
                data_info2 = ObtenerJson(data_info);
                console.log(data_info2);



                data1.push(data_info2);

            },
        });

    }

    setTimeout(() => {
        console.log(data1);
        console.log(
            [].concat.apply(data1).length
        )
        z1 = [].concat.apply(data1).length;
        console.log("z vale " + z1);

        if (z1 == 1) {
            toastr.info('Tienes ' + z1 + ' notificacion nueva');
            for (j = 0; j < z1; j++) {
                id = data1[j][1];
                usr = data1[j][0];
                if (usr == null) {
                    console.log("usr vacio")
                } else {
                    if (estate == 2) {
                        console.log(data1[j][1]);
                        console.log(usr);
                        $.ajax({
                            type: 'POST',
                            url: '../Controller/turn_usr.php',
                            data: { 'id': id },
                            success: function(data_info3) {
                                console.log(data_info3);
                                data_info_t = ObtenerJson(data_info3);
                                console.log(data_info_t);
                                console.log(data_info_t[1]);
                                usr = data_info_t[0];
                                code = data_info_t[1];
                                id = data_info_t[2];
                                $('.toast-message').css("background-color", "red !mportant");
                                toastr["success"]('<div id="c_turn"><div id="n_id">' + id + '</div><h5 style="font-size:10px;">' + usr + ' turno un documento con el ID: ' + id + '</h5><p> a la siguiente direccion: ' + code + '</p></div>');
                            },
                        });
                    } else {
                        console.log(data1[j][1]);
                        console.log(usr)
                        toastr["success"]('<div id="n_id">' + id + '</div><h5 style="font-size:10px;">' + usr + ' regitro un documento con el ID: ' + id + '</h5>');
                    }

                }

                //alertify.notify('<p id="id_text">' + id + '</p>', 'custom', 600);
            }
        } else {
            toastr.info('Tienes ' + z1 + ' notificaciones nuevas');
            for (j = 0; j < z1; j++) {
                id = data1[j][1];
                usr = data1[j][0];
                estate = data1[j][2];
                if (usr == null) {
                    console.log("usr vacio")
                } else {
                    if (estate == 2) {
                        console.log(data1[j][1]);
                        console.log(usr);
                        $.ajax({
                            type: 'POST',
                            url: '../Controller/turn_usr.php',
                            data: { 'id': id },
                            success: function(data_info3) {
                                console.log(data_info3);
                                data_info_t = ObtenerJson(data_info3);
                                console.log(data_info_t);
                                console.log(data_info_t[1]);
                                usr = data_info_t[0];
                                code = data_info_t[1];
                                id = data_info_t[2];
                                $('.toast-message').css("background-color", "red !mportant")
                                toastr["success"]('<div id="c_turn"><div id="n_id">' + id + '</div><h5 style="font-size:10px;">' + usr + ' turno un documento con el ID: ' + id + '</h5><p> a la siguiente direccion: ' + code + '</p></div>');
                            },
                        });

                    } else {
                        console.log(data1[j][1]);
                        console.log(usr)
                        toastr["success"]('<div id="n_id">' + id + '</div><h5 style="font-size:10px;">' + usr + ' regitro un documento con el ID: ' + id + '</h5>');
                    }

                }
                //alertify.notify('<p id="id_text">' + id + '</p>', 'custom', 600);

            }
        }
    }, 2000)

    toastr.options.onclick = function(e) {
        e.preventDefault();

        $(".toast-message").on('click', function() {

            console.log("prueba");
            console.log($(this).children("#n_id").text());
            //swal($(this).children("#n_id").text());
        });
    }

}

// Fin del modulo de notificaciones antiguas y registros
////////////Modulo alerta folios libres //////////////////
function get_data_f(data) {
    var data1 = [];
    var folio = "";
    var data_info2 = [];
    let data_last_2 = parseInt(localStorage.getItem("f_open"));
    let rep = data - data_last_2;
    let data_send = data_last_2;
    //alert(data);
    $.ajax({
        type: 'POST',
        url: '../Controller/open_usr.php',
        data: { 'id': data },
        success: function(data_info) {
            console.log(data_info);
            folio = data_info;
            //console.log(JSON.parse(data_info));
            //data_info2 = JSON.parse(data_info);
            //console.log("HOLA");
            console.log(data_info);
            // data_info2 = ObtenerJson(data_info);
            //console.log(data_info2);

        },
    });

    /*for (i = 0; i < rep; i++) {
        data_send += 1;
        alert(data_send);

        $.ajax({
            type: 'POST',
            url: '../Controller/turn_usr.php',
            data: { 'data': data_send },
            success: function(data_info) {
                //console.log(JSON.parse(data_info));
                //data_info2 = JSON.parse(data_info);
                console.log("HOLA");
                data_info2 = ObtenerJson(data_info);
                console.log(data_info2);



                data1.push(data_info2);

            },
        });

    }*/

    setTimeout(() => {


        //toastr.info('Se libero un folio');
        //usr = data_info2[0];
        //code = data_info2[1];
        if (usr == null) {
            console.log("usr vacio")
        } else {


            toastr["success"]('<div id="c_open"><div id="n_id">' + '</div><h5 style="font-size:11px;">Se libero el folio: ' + folio + '</h5></div>');


            //alertify.notify('<p id="id_text">' + id + '</p>', 'custom', 600);

        }
    }, 2000)

    toastr.options.onclick = function(e) {
        e.preventDefault();

        $(".toast-message").on('click', function() {

            console.log("prueba");
            console.log($(this).children("#n_id").text());
            //swal($(this).children("#n_id").text());
        });
    }
}


////////// Modulo de turnados ///////////////////////

function get_data_turn(data) {
    var data1 = [];
    var data_info2 = [];
    let data_last_2 = parseInt(localStorage.getItem("doc_t"));
    let rep = data - data_last_2;
    let data_send = data_last_2;
    //alert(data);
    $.ajax({
        type: 'POST',
        url: '../Controller/turn2_usr.php',
        data: { 'id': data },
        success: function(data_info) {
            //console.log(JSON.parse(data_info));
            //data_info2 = JSON.parse(data_info);
            //console.log("HOLA");
            //console.log(data_info);
            data_info2 = ObtenerJson(data_info);
            console.log(data_info2);

        },
    });

    /*for (i = 0; i < rep; i++) {
        data_send += 1;
        alert(data_send);

        $.ajax({
            type: 'POST',
            url: '../Controller/turn_usr.php',
            data: { 'data': data_send },
            success: function(data_info) {
                //console.log(JSON.parse(data_info));
                //data_info2 = JSON.parse(data_info);
                console.log("HOLA");
                data_info2 = ObtenerJson(data_info);
                console.log(data_info2);



                data1.push(data_info2);

            },
        });

    }*/

    setTimeout(() => {
        console.log(data_info2);
        console.log(
            [].concat.apply(data_info2).length
        )
        z1 = [].concat.apply(data_info2).length;
        console.log("z vale " + z1);

        if (z1 == 3) {
            toastr.info('Tienes ' + 1 + ' notificacion nueva de turno');
            id = data_info2[2];
            usr = data_info2[0];
            code = data_info2[1];
            if (usr == null) {
                console.log("usr vacio")
            } else {

                toastr["success"]('<div id="c_turn"><div id="n_id">' + id + '</div><h5 style="font-size:10px;">' + usr + ' turno un documento con el ID: ' + id + '</h5><p> a la siguiente direccion: ' + code + '</p></div>');
            }

            //alertify.notify('<p id="id_text">' + id + '</p>', 'custom', 600);

        }
    }, 2000)

    toastr.options.onclick = function(e) {
        e.preventDefault();

        $(".toast-message").on('click', function() {

            console.log("prueba");
            console.log($(this).children("#n_id").text());
            //swal($(this).children("#n_id").text());
        });
    }


}









//////////////////////////////////////////////////////


$(document).ready(function() {


    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "100000",
        "hideDuration": "1000",
        "timeOut": "500000",
        "extendedTimeOut": "1000000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": true
    }





    getLastUsr();


    //alert("HOLA");

    //using custom CSS
    // .ajs-message.ajs-custom { leftcolor: #31708f;  background-color: #d9edf7;  border-color: #31708f; }
    setInterval(() => {

        $.ajax({
            type: 'POST',
            url: '../Controller/notify.php',
            data: { 'op': 3 },
            success: function(data) {
                console.log(data);
                if (data != localStorage.getItem("f_open")) {
                    //alert(rep);
                    get_data_f(data);
                    console.log(localStorage.getItem("f_open"));
                    localStorage.setItem("f_open", data);

                }
                //localStorage.setItem("doc_t", data);
            },
        });


        $.ajax({
            type: 'POST',
            url: '../Controller/notify.php',
            data: { 'op': 1 },
            success: function(data) {
                console.log(data);
                if (data != localStorage.getItem("doc_t")) {
                    //alert(rep);
                    get_data_turn(data);
                    console.log(localStorage.getItem("doc_t"));
                    localStorage.setItem("doc_t", data);

                }
                //localStorage.setItem("doc_t", data);
            },
        });


        $.ajax({
            type: 'POST',
            url: '../Controller/notify.php',
            data: { 'op': 2 },
            success: function(data) {
                //console.log(data);
                if (data != localStorage.getItem("doc")) {
                    //alert(rep);
                    get_data_notify(data);
                    localStorage.setItem("doc", data);

                }
                localStorage.setItem("doc", data);
            },
        });

    }, 3000)


});