/*$.validator.setDefaults( {
    submitHandler: function () {
        alert( "submitted!" );
    }
} );*/

$( document ).ready( function () {

    $( "#form_propiedad" ).validate( {
        rules: {
            pub_titulo: "required",
            pub_descripcion: "required",
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
            prop_valor: {
                required: true,
                minlength: 2
            },
            per_email: {
                required: true,
                email: true
            },
            prop_direccion: "required",

            tipoinmu_id:{
                required: true
            },
            tipopera_id:{
                required: true
            },
            antig_id: {
                required: true
            },
            hab_id:{
                required: true
            },
            cochera_id:{
                required: true
            },
            numamb_id:{
                required: true
            },
            ban_id:{
                required: true
            }
        },
        messages: {
            pub_titulo: "Ingrese un Titulo de la Publicación",
            pub_descripcion: "Ingrese una Descripción de la Publicación",
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
            prop_valor: {
                required: "Ingrese un Valor",
                minlength: "Debe ingresar más de 2 caracteres"
            },
            per_email: "Ingrese una Email",
            prop_direccion: "Ingrese una Dirección",

            tipoinmu_id:"Seleccione una Valor",
            tipopera_id:"Seleccione una Valor",
            antig_id:"Seleccione una Valor",
            hab_id:"Seleccione una Valor",
            cochera_id:"Seleccione una Valor",
            numamb_id:"Seleccione una Valor",
            ban_id:"Seleccione una Valor"
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