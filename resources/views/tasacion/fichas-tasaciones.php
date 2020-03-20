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
							<li class="nav-admin-mobile"><a href="mis-propiedades.php">Mis Propiedades</a></li>
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
						<li><a href="mis-propiedades.php">MIS PROPIEDADES</a></li>
						<li><a href="red-ivm.php">RED IVM</a></li>
						<li><a href="consultas.php">CONSULTAS</a></li>
						<li><a href="propietarios.php">PROPIETARIOS</a></li>
						<li><a href="tasacionesaa.php">TASACIONES</a></li>
						<li class="btn-blue pull-right"><a href="nueva-propiedad.php"><i class="fa fa-plus-circle"></i> CARGAR PROPIEDAD</a></li>
					  </ul>
				  </div>
				</nav>
			</section>
		</header>
		
		<!-- Main Content -->
		<section class="list-category">
			<div class="container">
                <br><br><h2 class="admin-title">Fichas para tasaciones</h2><br>
				<ul class="row">
					<li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-aridos.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-aridos.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Compraventa</p>
						</a>
					</li>
					<li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-viales.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-viales.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Escritos judiciales</p>
						</a>
					</li>
					<li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>
					<li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-contenedores.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-contenedores.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Locaciones</p>
						</a>
					</li>
                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>
                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>
                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>
                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>
                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>
                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>
                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>
                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<a href="#">
							<div class="ch-item">				
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front">
											<img src="images/icons/category-climatizacion.png"/>
										</div>
										<div class="ch-info-back">
											<img src="images/icons/category-climatizacion.png"/>
										</div>	
									</div>
								</div>
							</div>
							<p>Fondos de comercio</p>
						</a>
					</li>					
				</ul>
			</div>
		</section>
		
		<script>
			$(document).ready(function(){
				$("#header").sticky({topSpacing:0});
			});
		</script>
		
	</body>
</html>