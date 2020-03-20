
$( document ).ready( function () {

    $("#form_tasacion_create").validate( {
        rules: {
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
            },
            tipoinmu_id: {
                required:true
            },
            hab_id: {
                required:true
            }
        },
        messages: {
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
            per_email: "Ingrese un Email",
            tipoinmu_id: "Ingrese el Tipo de Propiedad",
            hab_id: "Requerido"
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


    $("#form_tasacion_edit").validate( {
        rules: {
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
            },
            tipoinmu_id: {
                required:true
            },
            hab_id: {
                required:true
            }
        },
        messages: {
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
            per_email: "Ingrese un Email",
            tipoinmu_id: "Ingrese el Tipo de Propiedad",
            hab_id: "Requerido"
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