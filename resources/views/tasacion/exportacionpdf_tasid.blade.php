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
        <h3 class="admin-subtitle-form">Datos Personales ID: {{ $tasacion->tas_id }}</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Apellido: {{ $tasacion->per_apellido }}<br>
                        Nombre: {{ $tasacion->per_nombre }}<br>
                        DNI: {{ $tasacion->per_dni }}<br>
                        Email: {{ $tasacion->per_email }}<br>
                        Tel Fijo: {{ $tasacion->per_tel_fijo }}<br>
                        Tel Cel: {{ $tasacion->per_tel_cel }}<br>
                        Domicilio: {{ $tasacion->per_domicilio }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Valor tasación</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Valor de Venta: {{ $tasacion->tas_valor_venta }}<br>
                        Valor de Alquiler: {{ $tasacion->tas_valor_alq }}<br>
                        Valor de Alquiler Temporario: {{ $tasacion->tas_valor_alq_temp }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Ubicación</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Domicilio: {{ $tasacion->per_domicilio }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Tipo de Propiedad</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>Tipo de Propiedad: {{ $tasacion->tipoinmu_nombre }}</p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Datos propiedad</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Ambiente: {{ $tasacion->numamb_nombre }}<br>
                        Dormitorios: {{ $tasacion->hab_nombre }}<br>
                        Baños: {{ $tasacion->ban_nombre }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Comisión / Costo Tasación</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>Comisión / Costo Tasación: {{ $tasacion->tas_valor_tasacion }}</p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Nota / Comentarios</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>Nota / Comentarios: {{ $tasacion->tas_descripcion }}</p>
                </div>
            </div>
        </div>


    </div>
</section>

</body>
</html>
