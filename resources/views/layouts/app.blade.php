<!DOCTYPE html>
<html lang="es">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inmuebles Villa María - Administrador > Propietarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="application-name" content="Inmuebles Villa María"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />

    <!-- le fav -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-128.png') }}" sizes="128x128" />
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}" type="image/x-icon" >

    <!-- le fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700,800,900' rel='stylesheet' type='text/css'>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">

    <!-- le css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/select2/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/jPushMenu.css') }}" />

    <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery.stepy.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}"/>

    @yield('style')

    <style type="text/css" media="screen">
        .map_canvas { float: left; }
        .map_canvas {
            width: 100%;
            height: 400px;
            margin: 10px 20px 10px 0;
        }
    </style>


</head>

@if (Auth::guest())

    <!-- le master scripts -->

@else

    @include('layouts.menu')

@endif

@yield('content')

@include('modal_envio_consulta')

<!-- le master scripts -->
<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>

<script type="text/javascript" src="https://jqueryvalidation.org/files/dist/jquery.validate.js"></script>

<script type="text/javascript" src="{{ asset('js/jPushMenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-wysiwyg/bootstrap-wysiwyg.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-wysiwyg/jquery.hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/common_many.js') }}"></script>

<script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>

<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.javascripts/1.4.2/respond.min.js"></script>



<![endif]-->

<!-- Inicio de la comprobación de la version del navegador -->

<script type="text/javascript">

    navigator.browserSpecs = (function(){
        var ua= navigator.userAgent, tem,
            M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
        if(/trident/i.test(M[1])){
            tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
            return {name:'IE',version:(tem[1] || '')};
        }
        if(M[1]=== 'Chrome'){
            tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
            if(tem!= null) return {name:tem[1].replace('OPR', 'Opera'),version:tem[2]};
        }
        M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
        if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
        return {name:M[0],version:M[1]};
    })();

    console.log(navigator.browserSpecs); //Object { name: "Firefox", version: "42" }

    if (navigator.browserSpecs.name == 'Chrome') {
        // Do something for Firefox.
        if (navigator.browserSpecs.version < 55) {
            alert('La pagina web no soporta la version de chrome instalada. Por favor actualice a la ultima version estable para poder ingresar.')
            window.location.href = 'https://www.google.com/chrome/';
        }
    }
    else {

    }
</script>

<!-- Fin de la comprobación de la version del navegador -->


<script>
    $(document).ready(function () {
        $(".toggler").on("click", function() {
            $(".auth-page-container").toggleClass("flip");
        });
    });
</script>

@yield('scripts')

</body>
</html>
</html>