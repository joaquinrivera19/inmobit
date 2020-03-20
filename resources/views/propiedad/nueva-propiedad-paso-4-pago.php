<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Inmuebles Villa María - Administrador > Nueva Propiedad > Publicar</title>
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
                    <li><a href="#" class="btn disabled">Caracteristicas</a></li>
					<li><a href="#" class="btn disabled">Multimedia</a></li>
					<li><a href="#" class="btn active">Publicar</a></li>
				</ul>
				<form class="form-new-prop" id="step-3">
					<h3 class="admin-subtitle-form">Seleccionar abono</h3>
					<p>Selecciona uno de nuestros packs de <b>abonos mensuales</b> para inmobiliarias. Los mismos están pensados para ayudarte a ahorrar tiempo y dinero, ya que con solo un click, tu propiedad se publica automáticamente en nuestro portal. Elegí tu abono, hace click en <b>"Contratar"</b>, luego selecciona la forma de pago del mismo y una vez acreditado el pago podrás publicar todas las propiedades que quieras de acuerdo al abono mensual elegido.</p>
					<div class="table-plans">
					<div class="row">
						<div class="hidden-xs hidden-sm col-xs-12 col-md-4 col-lg-4">
							<div class="row">
								<div class="col-xs-12">
									<div class="head-plans">
										<span class="title">Tipo de Abono</span>
									</div>
									<div class="body-plans">
										<span class="value border">Cantidad de Avisos Simples:</span>
										<span class="value border">Cantidad de Avisos Destacados:</span>
										<span class="value border">Cantidad de Avisos Premium:</span>
										<span class="value">Duración de publicación de cada aviso: <b>30 días</b></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="head-plans color-1">
										<span class="type-plan">ABONO 1</span>
										<span class="price-plan">$ <b>150</b></span>
									</div>
									<div class="body-plans">
										<span class="value border center bold">10 <span class="data-plan">Avisos Simples</span></span>
										<span class="value border center bold">5 <span class="data-plan">Avisos Destacados</span></span>
										<span class="value border center bold">2 <span class="data-plan">Avisos Premium</span></span>
										<span class="value border center hidden-md hidden-lg"> Duración de publicación: 30 días<br/>Precio sin IVA</span>
										<span class="value hidden-xs hidden-sm"></span>
									</div>
									<div class="footer-plans">
										<button type="button" onclick="window.location.href='contratar.php'" class="btn btn-large btn-orange">CONTRATAR <span class="hidden-lg hidden-sm">ABONO 1</span></button>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="head-plans color-2">
										<span class="type-plan">ABONO 2</span>
										<span class="price-plan">$ <b>250</b></span>
									</div>
									<div class="body-plans">
										<span class="value border center bold">Ilimitado <span class="data-plan">En Avisos Simples</span></span>
										<span class="value border center bold">10 <span class="data-plan">Avisos Destacados</span></span>
										<span class="value border center bold">5 <span class="data-plan">Avisos Premium</span></span>
										<span class="value border center hidden-md hidden-lg"> Duración de publicación: 30 días<br/>Precio sin IVA</span>
										<span class="value center hidden-xs hidden-sm">Precios sin IVA</span>
									</div>
									<div class="footer-plans">
										<button type="button" onclick="window.location.href='contratar.php'" class="btn btn-large btn-orange">CONTRATAR <span class="hidden-lg hidden-sm">ABONO 2</span></button>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="head-plans color-3">
										<span class="type-plan">ABONO 3</span>
										<span class="price-plan">$ <b>400</b></span>
									</div>
									<div class="body-plans">
										<span class="value border center bold">Ilimitado <span class="data-plan">En Avisos Simples</span></span>
										<span class="value border center bold">Ilimitado <span class="data-plan">En Avisos Destacados</span></span>
										<span class="value border center bold">Ilimitado <span class="data-plan">En Avisos Premium</span></span>
										<span class="value border center hidden-md hidden-lg"> Duración de publicación: 30 días<br/>Precio sin IVA</span>
										<span class="value hidden-xs hidden-sm"></span>
									</div>
									<div class="footer-plans">
										<button type="button" onclick="window.location.href='contratar.php'" class="btn btn-large btn-orange">CONTRATAR <span class="hidden-lg hidden-sm">ABONO 3</span></button>
									</div>
								</div>
							</div>
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