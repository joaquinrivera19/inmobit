/*$.validator.setDefaults( {
 submitHandler: function () {
 alert( "submitted!" );
 }
 } );*/

$( document ).ready( function () {

    $( "#form_localcomercial" ).validate( {
        rules: {
            comer_nombre: "required",
            comer_direccion: "required",
            per_dni:{
                required: true
            },
            per_apellido: {
                required: true,
                minlength: 2
            },
            per_nombre: {
                required: true,
                minlength: 2
            },
            per_email: {
                required: true,
                email: true
            }
        },
        messages: {
            comer_nombre: "Ingrese un Nombre Comercial",
            comer_direccion: "Ingrese una Dirección Comercial",
            per_dni:{
                required: "Ingrese el DNI"
            },
            per_apellido: {
                required: "Ingrese el Apellido",
                minlength: "Debe ingresar más de 2 caracteres"
            },
            per_nombre: {
                required: "Ingrese el Nombre",
                minlength: "Debe ingresar más de 2 caracteres"
            },
            per_email: "Ingrese una Email"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    } );

} );