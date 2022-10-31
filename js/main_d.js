var url_listar_usuario = "../View/listar.php";

// url para llamar la peticion por ajax

function mostrarLoading() {
  document.getElementById("mostrar_loading").style.display = "none";
  document.getElementById("Contenido").style.display = "block";
}

$(document).ready(function () {
  // se genera el paginador
  paginador = $(".pagination");
  // cantidad de items por pagina
  var items = 25,
    numeros = 4;
  // inicia el paginador
  init_paginator(paginador, items, numeros);
  // se envia la peticion ajax que se realizara como callback
  set_callback(get_data_callback);
  cargaPagina(0);
});
// peticion ajax enviada como callback
function get_data_callback() {
  $.ajax({
    data: {
      limit: itemsPorPagina,
      offset: desde,
    },
    type: "POST",
    url: url_listar_usuario,
    beforeSend: function () {
      document.getElementById("Contenido").style.display = "none";
      document.getElementById("mostrar_loading").style.display = "block";
      document.getElementById("mostrar_loading").innerHTML =
        "<img src='../img/loading2.gif' width='600px' height='400px'>";
    },
  })
    .done(function (data, textStatus, jqXHR) {
      // obtiene la clave lista del json data
      setTimeout(mostrarLoading, 500);
      var lista = data.lista;
      $("#table").html("");

      // si es necesario actualiza la cantidad de paginas del paginador
      if (pagina == 0) {
        creaPaginador(data.cantidad);
      }
      // genera el cuerpo de la tabla
      $.each(lista, function (ind, elem) {
        $(
          "<tr id='id_tr'>" +
            "<td data-valor='" +
            elem.id +
            "'>" +
            "<input type='checkbox'" +
            "</td>" +
            "<td>" +
            elem.oficio +
            "</td>" +
            "<td>" +
            elem.asunto +
            "</td id='texto'>" +
            "<td>" +
            elem.estado +
            "</td>" +
            "<td id='prueba' data-valor='" +
            elem.id +
            "'class='click'> <button><img title='Ver documento' src='../img/ver.png' width='20px'></button>" +
            "</td>" +
            "</tr>"
        ).appendTo($("#table"));
      });
      $(function () {
        $(".click").click(function (e) {
          e.preventDefault();
          var data = $(this).attr("data-valor");
          localStorage.setItem("documento", data);
          console.log(data);
          $(function () {
            console.log("Inicia");
            var textoBusqueda = data;
            if (textoBusqueda != "") {
              $.post(
                "../js/buscar2.php",
                { valorBusqueda: textoBusqueda },
                function (mensaje) {
                  var c2 = document.querySelector("#resultadoBusqueda");
                  console.log("Es:" + c2);
                  $("#resultadoBusqueda").html(mensaje);
                }
              );
            } else {
              "#resultadoBusqueda".html("<p>JQUERY VACIO </p>");
            }
          });
        });
      });
    })
    .fail(function (jqXHR, textStatus, textError) {
      alert("Error al realizar la peticion dame".textError);
    });
}
