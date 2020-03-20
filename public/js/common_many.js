// ------------- Comienza validacion que busca algun check seleccionado ---------


$(document).ready(function () {
    valor_chek()
});


function valor_chek() {

    $('.btn_form_superior').prop('disabled', true);

    var $checkboxes = $('#form_superior input[type="checkbox"]');

    $checkboxes.change(function () {
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;

        if (countCheckedCheckboxes >= '1') {

            $('.btn_form_superior').prop('disabled', false);

        } else {

            $('.btn_form_superior').prop('disabled', true);

        }

    });
}


// ------------- Finaliza validacion que busca algun check seleccionado ---------

// -------------- Comienza el modal enviar fichas muchos -----------------

$('#modal_enviar_fichas_muchos').on('show.bs.modal', function (e) {
    datos_modal(e);
});

// -------------- Finaliza el modal enviar fichas muchos -----------------

// -------------- Comienza el modal cambiar estado muchos -----------------

$('#modal_cambiar_estados_muchos').on('show.bs.modal', function (e) {
    datos_modal(e);
});

// -------------- Finaliza el modal cambiar estado muchos -----------------

// -------------- Comienza el modal eliminar muchos -----------------

$('#modal_eliminar_muchos').on('show.bs.modal', function (e) {
    datos_modal(e);
});

// -------------- Finaliza el modal eliminar muchos -----------------

// -------------- Comienza el modal exportar muchos -----------------

$('#modal_exportar_muchos').on('show.bs.modal', function (e) {
    datos_modal(e);
});

// -------------- Finaliza el modal exportar muchos -----------------

// -------------- Comienza el modal enviar ficha muchos -----------------

$('#modal_enviar_fichas_muchos').on('show.bs.modal', function (e) {


    var tipo_botom_superior = $(e.relatedTarget).data('form_superior');

    var web = 'www.inmobit.com/propiedad/';

    $('.tipo_botom_superior').attr('value', tipo_botom_superior);

    $(".holder").empty();

    $('#form_superior input[type="checkbox"]').each(function () {

        var checkbox_this = $(this);

        if (checkbox_this.is(":checked") == true) {

            checkbox_this.attr('value', '1');

            var id = checkbox_this.data('id');

            var nombre = checkbox_this.attr('name');

            $(".holder").append(web + id + "<input type='hidden' name=" + nombre + " value=" + web + id +"></br>");
        }

    });


});

// -------------- Finaliza el modal enviar ficha muchos -----------------


// ------------- Comienzo de Funcion a reutilizar en todas las modales -----------

function datos_modal(e) {

    var tipo_botom_superior = $(e.relatedTarget).data('form_superior');

    $('.tipo_botom_superior').attr('value', tipo_botom_superior);

    $(".holder").empty();

    $('#form_superior input[type="checkbox"]').each(function () {

        var checkbox_this = $(this);

        if (checkbox_this.is(":checked") == true) {

            checkbox_this.attr('value', '1');

            var id = checkbox_this.data('id');

            var nombre = checkbox_this.attr('name');

            $(".holder").append("ID: " + id + "<input type='hidden' name=" + nombre + " value=1></br>");
        }

    });
}


// ------------- Finaliza la Funcion a reutilizar en todas las modales -----------
