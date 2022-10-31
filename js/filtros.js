"use strict";

window.addEventListener("load", function (e) {
  console.log("DOM CARGADO");
  e.preventDefault();
  formulario.addEventListener("submit", function () {
    var tablad = document.querySelector("#tabla_r");
    tablad.style.display = "none";

    var tablaf = document.querySelector("#table2");
    tablaf.style.display = "block";

    let select = document.getElementById("direccion")[0],
      options = select.options,
      len = options.length,
      data = "",
      i = 0;
    while (i < len) {
      if (option[i].selected) data += "&" + select.name + "=" + option[i].value;
      i++;
    }

    console.log(data);

    var form = document.getElementById("formulario");

    var datos = new FormData(formulario);
    console.log(datos);
    console.log(datos.get("fecha_o"));
    console.log(datos.get("fecha_l"));
    console.log(datos.get("fecha_r"));
    console.log(datos.get("direccion"));
    console.log(datos.get("tipo"));
    return data;
  });
});
