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
					<li><a href="#" class="btn active">Datos principales</a></li>
                    <li><a href="#" class="btn disabled">Caracteristicas</a></li>
					<li><a href="#" class="btn disabled">Multimedia</a></li>
					<li><a href="#" class="btn disabled">Publicar</a></li>
				</ul>
				<form class="form-new-prop" id="step-1">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="label"><b>Título</b> (incluya el tipo de propiedad y su principal característica)</label>
								<input type="text" id="title" class="form-control" placeholder="Título de la publicación">
							</div>
							<div class="form-group">
								<label class="label"><b>Descripción</b> (incluya toda la información relevante de la propiedad)</label>
								<textarea id="details" class="form-control" rows="6"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Tipo de inmueble</label>
								<select id="type" class="form-control">
									<option>Elija tipo</option>
                                    <option>Casa</option>
                                    <option>Departamento</option>
                                    <option>Quinta</option>
                                    <option>Terreno o lote</option>
                                    <option>Galpón</option>
                                    <option>Local comercial</option>
                                    <option>Oficina</option>
                                    <option>Cochera</option>
									<option></option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Tipo de operación</label>
								<select id="type" class="form-control">
									<option>Elije operación</option>
                                    <option>Venta</option>
                                    <option>Alquiler</option>
									<option></option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Antigüedad</label>
								<select id="type" class="form-control">
									<option>Seleccione antigüedad</option>
                                    <option>0 a 5 años</option>
                                    <option>6 a 10 años</option>
                                    <option>11 a 20 años</option>
                                    <option>21 a 30 años</option>
                                    <option>31 a 40 años</option>
                                    <option>41 a 50 años</option>
                                    <option>más de 51 años</option>
									<option></option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Habitaciones</label>
								<select id="type" class="form-control">
									<option>Seleccione cantidad</option>
									<option>1 hab.</option>
									<option>2 hab.</option>
									<option>3 hab.</option>
									<option>4 hab.</option>
									<option>5 hab.</option>
									<option>6 hab.</option>
									<option>7 hab.</option>
									<option>8 hab.</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Cocheras</label>
								<select id="type" class="form-control">
									<option>Seleccione cantidad</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Cantidad de ambientes</label>
								<select id="type" class="form-control">
									<option>Seleccione cantidad</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Baños</label>
								<select id="type" class="form-control">
									<option>Seleccione cantidad</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group label-empty">
								<label class="label">&nbsp;</label>
								<div class="checkbox">
									<label>
									  <input type="checkbox"> Propiedad ocupada
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6">
							<h3 class="admin-subtitle-form">Precio</h3>
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
									<div class="form-group">
										<select id="currency" class="form-control">
											<option>U$D</option>
											<option>AR$</option>
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<input type="text" id="price" class="form-control" placeholder="Ingrese valor"/>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-5">
									<div class="form-group label-empty">
										<label class="label"></label>
										<div class="checkbox">
											<label>
											  <input type="checkbox"> Ocultar precio
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6">
							<h3 class="admin-subtitle-form">Comparte comisión</h3>
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group label-empty">
										<label class="label"></label>
										<label class="radio-inline">
										  <input type="radio" name="comision" id="comisionSi" value="comisionSi"> Si
										</label>
										<label class="radio-inline">
										  <input type="radio" name="comision" id="comisionNo" value="comisionNo"> No
										</label>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<div class="input-group">
										  <input type="text" class="form-control" placeholder="Porcentaje">
										  <span class="input-group-addon">%</span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-5 col-lg-5">
									<div class="form-group label-empty">
										<label class="label"></label>
										<div class="checkbox">
											<label>
											  <input type="checkbox"> Mostrar en RED IVM
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<h3 class="admin-subtitle-form">Dimensiones</h3>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<div class="form-group">
								<label class="label">M2 construidos</label>
								<input type="text" id="barrio" class="form-control"/>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">M2 totales</label>
								<input type="text" id="barrio" class="form-control"/>
								<p class="help-inline"></p>
							</div>
						</div>
					</div>
                    <h3 class="admin-subtitle-form">Ubicación</h3>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<div class="form-group">
								<label class="label">Provincia</label>
								<select id="type" class="form-control">
									<option>Seleccione provincia</option>
									<option>Córdoba</option>
									<option>Buenos Aires</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Ciudad</label>
								<select id="type" class="form-control">
									<option>Seleccione ciudad</option>
									<option>Villa María</option>
                                    <option>Villa Nueva</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Barrio</label>
								<input type="text" id="barrio" class="form-control" placeholder="Ingrese barrio"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<div class="form-group">
								<label class="label">Dirección</label>
								<input type="text" id="barrio" class="form-control" placeholder="Ingrese dirección"/>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Código Postal</label>
								<input type="text" id="barrio" class="form-control" placeholder="Ingrese Código Postal"/>
								<p class="help-inline"></p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
							<div class="form-group label-empty">
								<label class="label"></label>
								<p class="help-inline">Los números ingresados serán utilizados por defecto en los avisos que publiques, pudiendo modificarlos posteriormente.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">	
						  <div class="form-group">
							  <div class="checkbox">
								<label>
								  <input type="checkbox"> Confidencial (se ocultará la información en el aviso)
								</label>
							  </div>
						  </div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">	
						  <label class="label">Mapa</label>
							<div id="map" class="map"></div>
							<script>
								var marker;

								function initMap() {
								  var map = new google.maps.Map(document.getElementById('map'), {
									zoom: 13,
									center: {lat: -32.4192088, lng: -63.2742394}
								  });

								  marker = new google.maps.Marker({
									map: map,
									draggable: true,
									animation: google.maps.Animation.DROP,
									position: {lat: -32.4192088, lng: -63.2742394}
								  });
								  marker.addListener('click', toggleBounce);
								}

								function toggleBounce() {
								  if (marker.getAnimation() !== null) {
									marker.setAnimation(null);
								  } else {
									marker.setAnimation(google.maps.Animation.BOUNCE);
								  }
								}
							</script>
							<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbY3wxcBNXmHszaOXZagNyhMriiKWxgW0&callback=initMap"></script>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">	
							<div class="action-map">
								<button type="button" class="btn btn-blue btn-large">Marcar dirección en mapa</button>
								<p>En caso que lo requiera, corrija la ubicación en el mapa arrastrando el marcador.</p>
							</div>
						</div>
					</div>
                    <br><h3 class="admin-subtitle-form">Datos propietario - Uso interno</h3>
                    <div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<section class="form-block">
								<div class="form-group">
									<div class="input-group">
									  <label class="label">Nombre y Apellido</label>
                                      <input type="text" id="names" class="form-control" placeholder="Nombre y Apellido">
									  <span class="input-group-btn">
										<button class="btn btn-orange disabled" type="button">Existente</button>
									  </span>
									</div>
								</div>
								<div class="form-group">
                                <label class="label">E-mail</label>
									<input type="text" id="mail" class="form-control" placeholder="E-mail">
								</div>
							</section>
						</div>
					</div>
                    <div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<div class="form-group">
								<label class="label">Teléfono celular</label>
								<input type="text" id="barrio" class="form-control" placeholder="Ingrese dirección"/>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<div class="form-group">
								<label class="label">Domicilio</label>
								<input type="text" id="barrio" class="form-control" placeholder="Ingrese Código Postal"/>
								<p class="help-inline"></p>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">	
							<div class="form-group">
								<label class="label">Comisión</label>
								<input type="text" id="barrio" class="form-control" placeholder="Ingrese dirección"/>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-12">	
							<button type="button" onclick="window.location.href='nueva-propiedad-paso-2.php'" class="btn btn-large btn-orange">Continuar</button>
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