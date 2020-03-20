<?php

Route::group(['middleware' => 'web'], function () {

    Auth::routes();

    Route::get('/home', 'HomeController@index');

    Route::get('/', 'HomeController@index');

    Route::resource('propiedad', 'PropiedadController');

    //Consulta
    Route::resource('consulta', 'ConsultaController');
    Route::get('getconsultaweb/{idpropiedad}', 'ConsultaController@getConsultaWeb');

    Route::resource('propietario', 'PropietarioController');
    Route::resource('tasacion', 'TasacionController');

    Route::resource('pregunta_frecuente', 'PreguntaFrecuenteController');
    Route::resource('perfil', 'LocalComercialController');
    Route::resource('comentario', 'ComentarioController');

    Route::get('utiles/contratos', 'UtilesController@getContratos');
    Route::get('utiles/fichas_tasaciones', 'UtilesController@getFichasTasaciones');

    Route::get('password', 'LocalComercialController@editpassword');
    Route::get('propiedades/{idpropietario}/{tipo}', 'PropiedadController@PropiedadesId');

    Route::post('propiedad/uploadFiles', 'PropiedadController@uploadFiles');


    Route::get('server_images/{idpropiedad}', 'PropiedadController@getServerImages');


    Route::post('localcomercial/uploadFiles', 'LocalComercialController@uploadFiles');

    Route::get('filtropublicacion/{estado?}/{tipooperacion?}/{tipoinmu?}/{numhab?}/{buscador?}/{select_ordenar?}', 'PropiedadController@filtroPublicacion');
    Route::get('filtroconsulta/{fecha_desde?}/{fecha_hasta?}/{buscador?}/{select_ordenar?}', 'ConsultaController@filtroConsulta');
    Route::get('filtrotasacion/{fecha_desde?}/{fecha_hasta?}/{buscador?}/{select_ordenar?}', 'TasacionController@filtroTasacion');
    Route::get('filtropropietario/{buscador?}', 'PropietarioController@filtroPropietario');
    Route::get('filtrocliente/{buscador?}', 'ClienteController@filtroCliente');

    //Exportacion Exce
    Route::get('getexportacionpropiedadid_excel/{idpublicacion}', 'PropiedadController@getExportacionPropiedadIdExcel');

    //Exportacion PDF
    Route::get('getexportacionpropiedadid_pdf/{idpublicacion}', 'PropiedadController@getExportacionPropiedadIdPdf');
    Route::get('getexportacionconsultaid_pdf/{idconsulta}', 'ConsultaController@getExportacionConsultaIdPdf');
    Route::get('getexportaciontasacionid_pdf/{idtasacion}', 'TasacionController@getExportacionTasacionIdPdf');

    //Acceso Admin
    Route::resource('cliente', 'ClienteController');

    //Autocomplete
    Route::get('autocomplete', 'UtilesController@autocomplete');

    Route::get('mi_cuenta/{idlocalcomercial}', 'ClienteController@miCuenta');


});