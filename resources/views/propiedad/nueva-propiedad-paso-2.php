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
		<meta name="msapplication-TileColor" content="#FFFFFF" />
		<meta name="msapplication-TileImage" content="mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
		
		<!-- le fav -->
		<link rel="icon" type="image/png" href="images/favicon/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="images/favicon/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="images/favicon/favicon-128.png" sizes="128x128" />
		<link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon" >
		
		<!-- le fonts -->
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700,800,900' rel='stylesheet' type='text/css'>

		<!-- le css -->
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/normalize.css"/>
		<link rel="stylesheet" href="css/main.css"/>
		<link rel="stylesheet" href="css/admin.css"/>
		
		<!-- le master scripts -->
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.sticky.js"></script>

		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.javascripts/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="admin">
		<div class="mask-small"></div>
		<header>
			<section class="head" id="header">
				<div class="container">
					<nav class="navbar admin-navbar">
						<div class="navbar-header">
						  <a href="index.php" class="logo">
							<img src="images/logo.png" alt="Inmuebles Villa María" title="Inmuebles Villa María"/>
						  </a>
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-nav" aria-expanded="false">
							<span class="mobile-only"><i class="fa fa-bars"></i></span>
						  </button>
						</div>	
						<div class="collapse navbar-collapse" id="admin-nav">
						  <ul class="nav navbar-nav">
							<li class="nav-admin-mobile"><a href="nueva-propiedad.php">Cargar Propiedad</a></li>
							<li class="nav-admin-mobile"><a href="listado.blade.php">Mis Propiedades</a></li>
							<li class="nav-admin-mobile"><a href="red-ivm.php">Red IVM</a></li>
							<li class="nav-admin-mobile"><a href="consultas.php">Consultas <span class="tag">12</span></a></li>
							<li class="nav-admin-mobile"><a href="consultas.php">Propietarios</a></li>
							<li class="nav-admin-mobile"><a href="consultas.php">Tasaciones</a></li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Soporte <span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="preguntas-frecuentes.php">Preguntas frecuentes</a></li>
								<li><a href="#" data-toggle="modal" data-target="#modal-query">Enviar una consulta</a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utiles <span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="contratos.php">Contratos</a></li>
								<li><a href="fichas-tasaciones.php">Tasaciones</a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta <span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="perfil.php">Perfil</a></li>
								<li><a href="cambiar-pass.php">Cambiar contraseña</a></li>
								<li><a href="mi-cuenta.php">Estado de cuenta</a></li>
							  </ul>
							</li>
							<li><a href="login.php">Salir</a></li>
						  </ul>
						</div>
					</nav>
				</div>
				<nav class="navbar-sections">
				  <div class="container">
					  <ul>
						<li><a href="listado.blade.php">MIS PROPIEDADES</a></li>
						<li><a href="red-ivm.php">RED IVM</a></li>
						<li><a href="consultas.php">CONSULTAS</a></li>
						<li><a href="propietarios.php">PROPIETARIOS</a></li>
						<li><a href="tasaciones.php">TASACIONES</a></li>
						<li class="btn-blue pull-right"><a href="nueva-propiedad-paso-1.php"><i class="fa fa-plus-circle"></i> CARGAR PROPIEDAD</a></li>
					  </ul>
				  </div>
				</nav>
			</section>
		</header>
		
		<!-- Main Content -->
		<section class="admin-content">
			<div class="container">
				<h2 class="admin-title">Publicar Inmueble</h2>
				<ul class="form-tabs">
					<li><a href="#" class="btn disabled">Datos principales</a></li>
                    <li><a href="#" class="btn active">Caracteristicas</a></li>
					<li><a href="#" class="btn disabled">Multimedia</a></li>
					<li><a href="#" class="btn disabled">Publicar</a></li>
				</ul>
				<form class="form-new-prop" id="step-1">
					<h3 class="admin-subtitle-form">Servicios</h3>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Agua corriente
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Internet
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Desagüe cloacal
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Luz
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Gas natural
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Video Cable
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Teléfono
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Pavimento
							  </label>
							</div>
						</div>
					</div>
                    <br><h3 class="admin-subtitle-form">Ambientes</h3>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Jardín
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Vestidor
							  </label>
							</div>
                            <div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Dormitorio en suite
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Altillo
							  </label>
							</div>
                            <div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Dependencia servicio
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Comedor
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Toilette
							  </label>
							</div>
                            <div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Balcón
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Cocina
							  </label>
							</div>
                            <div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Living
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Lavadero
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Patio
							  </label>
							</div>
                            <div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Hall
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Baulera
							  </label>
							</div>
                            <div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Escritorio
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Living comedor
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Terraza
							  </label>
							</div>
						</div>
					</div>
                    <br><h3 class="admin-subtitle-form">Instalaciones</h3>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Vigilancia
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Amoblado
							  </label>
							</div>
                            <div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Parrilla
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Gimnasio
							  </label>
							</div>
                            <div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Cancha deportes
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Laundry
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Hidromasaje
							  </label>
							</div>
                            <div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Sauna
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Calefacción
							  </label>
							</div>
                            <div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Solarium
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Quincho
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								SUM
							  </label>
							</div>
                            <div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Aire acondicionado
							  </label>
							</div>
							<div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Piscina
							  </label>
							</div>
                            <div class="checkbox disabled">
							  <label>
								<input type="checkbox" value="">
								Alarma
							  </label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="">
								Sala de juegos
							  </label>
							</div>
						</div>
					</div><br>
					<hr>
					<div class="row">
						<div class="col-xs-12">	
							<button type="button" onclick="window.location.href='nueva-propiedad-paso-3.php'" class="btn btn-large btn-orange">Continuar</button>
						</div>
					</div>
				</form>
			</div>
		</section>
		
		<script>
			$(document).ready(function(){
				$("#header").sticky({topSpacing:0});
			});
		</script>
		
	</body>
</html>