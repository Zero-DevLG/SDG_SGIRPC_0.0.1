function LoadingData()
{
    $('#loading-data').show();
    setTimeout(() => {
        $('#loading-data').hide();
    }, 1000);
}   




$(document).ready(function() {
    //mostrarTabla_Ar();
    mostrarTabla_ac();
    //mostrarTabla_Tr()
    mostrarAc_t();
    mostrarTabla_t();
    mostrarTA2021();
    mostrarTAreas2021()
    mostrarAres();
    mostrarRTitular();
    mostrarTablaga();
    mostrarTA2021();
    mostrarAs_t();
    mostrarAss();

// Tabla atendidos AREAS   
$('#reload-at-aR').click(()=>
{   
    LoadingData();
    tableAres.api().ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
            console.log('Exito actualizar tabla');
        });
    }, false);
});

//Tabla generados titular
$('#reload-g-t').click(()=>
{
    LoadingData();
    table_t.api().ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
            console.log('Exito actualizar tabla');
        });
    }, false);
});

//Tabla generados Areas
$('#reload-g-a').click(()=>
{
    LoadingData();
    table.api().ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
            console.log('Exito actualizar tabla');
        });
    }, false);
});

//Tabla generados Demanda ciudadana
$('#reload-g-ac').click(()=>
{
    LoadingData();
    table_ac.api().ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
            console.log('Exito actualizar tabla');
        });
    }, false);
});

//Tabla generados Copias de conocimiento
$('#reload-g-cc').click(()=>
{
    LoadingData();
    table_cc.api().ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
            console.log('Exito actualizar tabla');
        });
    }, false);
});

//Tabla turnos areas
$('#reload-t-ar').click(()=>
{
    LoadingData();
    table33.api().ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
            console.log('Exito actualizar tabla');
        });
    }, false);
});

//Tabla turnos titular
$('#reload-t-ti').click(()=>
{
    LoadingData();
    table22.api().ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
            console.log('Exito actualizar tabla');
        });
    }, false);
});

//Tabla turnos demanda ciudadana
$('#reload-t-ac').click(()=>
{
    LoadingData();
    table_ac_t.api().ajax.reload(function() {
        $(".paginate_button > a").on("focus", function() {
            $(this).blur();
            console.log('Exito actualizar tabla');
        });
    }, false);
});



});