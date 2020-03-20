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
        <h2 class="admin-title">Dato de la Propiedad ID: {{ $publicacion->pub_id }}</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Título: {{ $publicacion->pub_titulo }}<br>
                        Descripción: {{ $publicacion->pub_descripcion }}<br>
                        Tipo de inmueble: {{ $publicacion->tipoinmu_nombre }}<br>
                        Tipo de operación: {{ $publicacion->tipopera_nombre }}<br>
                        Antigüedad: {{ $publicacion->antig_nombre }}<br>
                        Habitaciones: {{ $publicacion->hab_nombre }}<br>
                        Cocheras: {{ $publicacion->cochera_nombre }}<br>
                        Cantidad de ambiente: {{ $publicacion->numamb_nombre }}<br>
                        Baños: {{ $publicacion->ban_nombre }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Precio</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Precio: {{ $publicacion->prop_valor }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Comparte comisión</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Comparte comisión: <br>
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Dimensiones</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        M2 Construidos: {{ $publicacion->prop_dim_construido }}<br>
                        M2 Totales:: {{ $publicacion->prop_dim_total }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Ubicación</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Dirección: {{ $publicacion->prop_direccion }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Datos propietario - Uso interno</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>
                        Apellido: {{ $publicacion->per_apellido }}<br>
                        Nombre: {{ $publicacion->per_nombre }}<br>
                        DNI: {{ $publicacion->per_dni }}<br>
                        Email: {{ $publicacion->per_email }}<br>
                        Tel Fijo: {{ $publicacion->per_tel_fijo }}<br>
                        Tel Cel: {{ $publicacion->per_tel_cel }}<br>
                        Domicilio: {{ $publicacion->per_domicilio }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Servicios</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <ul>
                        @foreach($servicios as $ser)

                            <li><p>{{ $ser->serv_nombre}}</p></li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Ambientes</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <ul>
                        @foreach($ambientes as $amb)

                            <li><p>{{ $amb->amb_nombre}}</p></li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <h3 class="admin-subtitle-form">Instalaciones</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <ul>
                        @foreach($instalaciones as $ins)

                            <li><p>{{ $ins->inst_nombre}}</p></li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </div>
</section>

</body>
</html>
