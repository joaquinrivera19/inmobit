<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inmuebles Villa María - Administrador > Nueva Propiedad > Datos principales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="application-name" content="Inmuebles Villa María"/>

    <!-- le fonts -->

    <!-- le css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css"/>

    <!--[if lt IE 9]>
    <![endif]-->
</head>
<body class="admin">
<div class="mask-small"></div>

<!-- Main Content -->
<section class="admin-content">
    <div class="container">
        <img src="{{ public_path() . '/images/logo.jpg' }}" id="logo"/>
        <br><br>
        <h2 class="admin-title">Datos del Interesado. Consulta ID: {{ $consulta->cons_id }}</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Apellido: {{ $consulta->per_apellido }}<br>
                        Nombre: {{ $consulta->per_nombre }}<br>
                        DNI: {{ $consulta->per_dni }}<br>
                        Email: {{ $consulta->per_email }}<br>
                        Tel Fijo: {{ $consulta->per_tel_fijo }}<br>
                        Tel Celular: {{ $consulta->per_tel_cel }}<br>
                        Domicilio: {{ $consulta->per_domicilio }}<br>
                        Comentario: {{ $consulta->cons_mensaje }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
