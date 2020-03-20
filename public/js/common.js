/**
 * Created by jrivera on 18/6/17.
 */
$(document).ready(function () {

    $('.btn_confirmar').click(function () {

        $('.btn_confirmar').hide();

        $('.btn_cerrar').text('Guardando..');

        $('.btn_cerrar').attr('disabled', true);

        $('.btn_cerrar').removeClass("btn-link");

        $('.btn_cerrar').addClass("btn-default");

    });
});


$(document).ready(function () {

    $('.valida_checkbox').on('submit', function (e) {

        // ----- Comienza la seccion de los input checkbox

        var this_master = $(this);

        this_master.find('input[type="checkbox"]').each(function () {
            var checkbox_this = $(this);

            if (checkbox_this.is(":checked") == true) {
                checkbox_this.attr('value', '1');
            } else {
                checkbox_this.prop('checked', true);
                checkbox_this.attr('value', '0');
            }
        });

        // ----- Finaliza la seccion de los input checkbox


        //$('.btn_hidden_guardando').show();
        //$('.btn_guardar').hide();

    });
});


/*$(document).ready(function () {

    $(".btn_form_superior").click(function () {

        var xe = [];

        var tipo_botom_superior = $(this).data('form_superior');

        $('#tipo_botom_superior').attr('value', tipo_botom_superior);

        $('#form_superior input[type="checkbox"]').each(function () {

            var checkbox_this = $(this);

            if (checkbox_this.is(":checked") == true) {

                checkbox_this.attr('value', '1');
            }


        });


        //$("#form_superior").submit();

    });
});*/


// Funcion que me retorna todos los datos de la persona ingresados por el apellido


$(document).ready(function () {

    var baseurl = $('input:text[name=url]').val();

    $('.apellido').keyup(function() {

        $(".apellido").autocomplete({
            source: baseurl + '/autocomplete',
            minLength: 3,
            select: function (event, ui) {

                //console.log(ui.item.apellido + ' ' + ui.item.nombre);

                //$('.apellido').val(ui.item.apellido);
                $('.nombre').val(ui.item.nombre);
                $('.dni').val(ui.item.dni);
                $('.email').val(ui.item.email);
                $('.tel_fijo').val(ui.item.tel_fijo);
                $('.tel_cel').val(ui.item.tel_cel);
                $('.domicilio').val(ui.item.domicilio);

            },
            change: function (event, ui) {
                if (!ui.item) {
                    $('.nombre').val('');
                    $('.dni').val('');
                    $('.email').val('');
                    $('.tel_fijo').val('');
                    $('.tel_cel').val('');
                    $('.domicilio').val('');
                }
            }
        }).data("ui-autocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append('<li>' + item.apellido  + ' ' + item.nombre  + '</li>')
                .appendTo(ul);
        };

    });

});

