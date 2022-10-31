
$(document).ready(function () {


    ///scripts tabla_actividades

    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
    let fecha_hoy = output;
    let fecha = output;
    localStorage.setItem("fecha_hoy", JSON.stringify(fecha));







});