var xhr = new XMLHttpRequest();
xhr.open("GET", "listar.php");
xhr.onload = function () {
  if (xhr.status == 200) {
    var json = JSON.parse(xhr.responseText);
    //var json = xhr.responseText;
    console.log(json);
    console.log(json.lista);
  } else {
    console.log(xhr.status);
  }
  /*if (JSON.stringify(json.lista) == "{}") {
    console.log("No hay resultados");
  } else {
    console.log("Hubo coincidencias");
  }
*/
  if (Object.entries(json.lista).length === 0) {
    //execute
    console.log("vacio");
    document.getElementById("notificaciones").src = "../img/nt1.png";
    document.getElementById("paginador").style.visibility = "hidden";
  } else {
    document.getElementById("notificaciones").src = "../img/nt2.png";
  }
};
xhr.send();
