@extends('layouts.app')

@section('style')

    {{--//--}}

@endsection


@section('content')

    <section class="admin-content">
        <div class="container">
            <h2 class="admin-title">Publicar Inmueble</h2>

        {!! Form::open(array('route' => ['propiedad.store', 'method' => 'POST'], 'enctype' =>'multipart/form-data','class' => 'form-new-prop custom valida_checkbox', 'id' => 'form_propiedad')) !!}

        <!-- Comienzo del Primer Step -->

            {!! Form::hidden('prop_id', $maxidpropiedad) !!}

            {!! Form::text('url', URL::to('/'),["style" =>"display: none"]) !!}

            <fieldset title="Datos principales">
                <legend>Datos principales</legend>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            {!! Form::label('pub_titulo', 'Título: (incluya el tipo de propiedad y su principal característica)', ['class' => 'label']) !!}
                            {!! Form::text('pub_titulo', null , ['class' => 'form-control','placeholder' => 'Título de la publicación']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('pub_descripcion', 'Descripción: (incluya toda la información relevante de la propiedad)', ['class' => 'label']) !!}
                            {!! Form::textarea('pub_descripcion',null,['class'=>'form-control', 'rows' => 6]) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('tipoinmu_id', 'Tipo de inmueble:', ['class' => 'label']) !!}
                            {!! Form::select('tipoinmu_id',$tipoinmueble, null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('tipopera_id', 'Tipo de operación:', ['class' => 'label']) !!}
                            {!! Form::select('tipopera_id',$tipooperacion, null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('antig_id', 'Antigüedad:', ['class' => 'label']) !!}
                            {!! Form::select('antig_id',$antiguedad, null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('hab_id', 'Habitaciones:', ['class' => 'label']) !!}
                            {!! Form::select('hab_id',$numerohabitacion, null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('cochera_id', 'Cocheras:', ['class' => 'label']) !!}
                            {!! Form::select('cochera_id',$numerocochera, null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('numamb_id', 'Cantidad de ambientes:', ['class' => 'label']) !!}
                            {!! Form::select('numamb_id',$numeroambiente, null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('ban_id', 'Baños:', ['class' => 'label']) !!}
                            {!! Form::select('ban_id',$numerobanio, null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-empty">
                            <label class="label">&nbsp;</label>
                            <div class="checkbox">
                                <label>

                                    {!!  Form::checkbox('prop_ocupada', '1', false) !!} Propiedad ocupada

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

                                    {!! Form::select('mon_id',$moneda, null, ['class' => 'form-control', 'id' => 'currency']) !!}

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">

                                    {!! Form::text('prop_valor', null , ['class' => 'form-control','placeholder' => 'Ingrese Valor']) !!}

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-5">
                                <div class="form-group label-empty">
                                    <label class="label"></label>
                                    <div class="checkbox">
                                        <label>

                                            {!!  Form::checkbox('prop_valor_oculto', '1', false) !!} Ocultar precio

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
                                        <input type="radio" name="asasd" id="comisionNo" value="comisionNo"> No
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="asd" class="form-control" placeholder="Porcentaje">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-5 col-lg-5">
                                <div class="form-group label-empty">
                                    <label class="label"></label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="aaa"> Mostrar en RED IVM
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="admin-subtitle-form">Dimensiones</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('prop_dim_construido', 'M2 Construidos: ', ['class' => 'label']) !!}
                            {!! Form::text('prop_dim_construido', null , ['class' => 'form-control','placeholder' => 'M2 Construidos']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('prop_dim_total', 'M2 Totales: ', ['class' => 'label']) !!}
                            {!! Form::text('prop_dim_total', null , ['class' => 'form-control','placeholder' => 'M2 Totales']) !!}

                            <p class="help-inline"></p>
                        </div>
                    </div>
                </div>
                <h3 class="admin-subtitle-form">Ubicación</h3>

                <div class="row">

                    <div class="col-md-7">
                        <div class="input-group content-group">
                            {!! Form::label('prop_direccion', 'Dirección: ', ['class' => 'label']) !!}
                            {!! Form::text('prop_direccion', null , ['class' => 'form-control','placeholder' => 'Ingrese dirección','id' => 'geocomplete']) !!}

                            <div class="input-group-btn" style="padding-top: 19px;">
                                <button class="btn btn-primary btn_campania" type="button" id="find"
                                        data-btn_campania="0">
                                    Buscar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group" style="padding-top: 16px; float: right;">
                            <div class="checkbox">
                                <label>

                                    {!!  Form::checkbox('prop_confidencial', '1', false) !!} Confidencial (se ocultará
                                    la información en el aviso)

                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="map_canvas"></div>

                    <input name="name" type="hidden" value="">
                    <input name="point_of_interest" type="hidden" value="">
                    <input name="lat" type="hidden" value="">
                    <input name="lng" type="hidden" value="">
                    <input name="location" type="hidden" value="">
                    <input name="location_type" type="hidden" value="">
                    <input name="formatted_address" type="hidden" value="">
                    <input name="bounds" type="hidden" value="">
                    <input name="viewport" type="hidden" value="">
                    <input name="route" type="hidden" value="">
                    <input name="street_number" type="hidden" value="">
                    <input name="postal_code" type="hidden" value="">
                    <input name="locality" type="hidden" value="">
                    <input name="sublocality" type="hidden" value="">
                    <input name="country" type="hidden" value="">
                    <input name="country_short" type="hidden" value="">
                    <input name="administrative_area_level_1" type="hidden" value="">
                    <input name="place_id" type="hidden" value="">
                    <input name="id" type="hidden" value="">
                    <input name="reference" type="hidden" value="">
                    <input name="url" type="hidden" value="">
                    <input name="website" type="hidden" value="">

                </div>

                <br>
                <h3 class="admin-subtitle-form">Datos propietario - Uso interno</h3>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('per_apellido', 'Apellido: ', ['class' => 'label']) !!}
                            {!! Form::text('per_apellido', null , ['class' => 'form-control apellido','placeholder' => 'Ingrese Apellido']) !!}

                            <p class="help-inline"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('per_nombre', 'Nombre: ', ['class' => 'label']) !!}
                            {!! Form::text('per_nombre', null , ['class' => 'form-control nombre','placeholder' => 'Ingrese Nombre']) !!}

                            <p class="help-inline"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('per_dni', 'DNI: ', ['class' => 'label']) !!}
                            {!! Form::text('per_dni', null , ['class' => 'form-control dni','placeholder' => 'Ingrese DNI']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('per_email', 'E-mail: ', ['class' => 'label']) !!}
                            {!! Form::text('per_email', null , ['class' => 'form-control email','placeholder' => 'Ingrese E-mail']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('per_tel_cel', 'Teléfono: ', ['class' => 'label']) !!}
                            {!! Form::text('per_tel_cel', null , ['class' => 'form-control tel_cel','placeholder' => 'Ingrese Teléfono']) !!}

                            <p class="help-inline"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('per_domicilio', 'Domicilio: ', ['class' => 'label']) !!}
                            {!! Form::text('per_domicilio', null , ['class' => 'form-control domicilio','placeholder' => 'Ingrese Dirección']) !!}

                            <p class="help-inline"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            {!! Form::label('prop_comision', 'Comisión: ', ['class' => 'label']) !!}
                            {!! Form::text('prop_comision', null , ['class' => 'form-control','placeholder' => 'Ingrese Comisión']) !!}

                        </div>
                    </div>
                </div>
                <br>
                <hr>

            </fieldset>

            <!-- Finaliza del Primer Step -->

            <!-- Comienzo del Segundo Step -->

            <fieldset title="Caracteristicas">
                <legend>Caracteristicas</legend>

                <h3 class="admin-subtitle-form">Servicios</h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="serv_id[1]">
                                Agua corriente
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="serv_id[2]">
                                Internet
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="serv_id[3]">
                                Desagüe cloacal
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="serv_id[4]">
                                Luz
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="serv_id[5]">
                                Gas natural
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="serv_id[6]">
                                Video Cable
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="serv_id[7]">
                                Teléfono
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="serv_id[8]">
                                Pavimento
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <h3 class="admin-subtitle-form">Ambientes</h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="amb_id[1]">
                                Jardín
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[2]">
                                Vestidor
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="amb_id[3]">
                                Dormitorio en suite
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[4]">
                                Altillo
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[5]">
                                Dependencia servicio
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="amb_id[6]">
                                Comedor
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[7]">
                                Toilette
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="amb_id[8]">
                                Balcón
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[9]">
                                Cocina
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[10]">
                                Living
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="amb_id[11]">
                                Lavadero
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[12]">
                                Patio
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="amb_id[13]">
                                Hall
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[14]">
                                Baulera
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[15]">
                                Escritorio
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="amb_id[16]">
                                Living comedor
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="amb_id[17]">
                                Terraza
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <h3 class="admin-subtitle-form">Instalaciones</h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="inst_id[1]">
                                Vigilancia
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[2]">
                                Amoblado
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="inst_id[3]">
                                Parrilla
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[4]">
                                Gimnasio
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[5]">
                                Cancha deportes
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="inst_id[6]">
                                Laundry
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[7]">
                                Hidromasaje
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="inst_id[8]">
                                Sauna
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[9]">
                                Calefacción
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[10]">
                                Solarium
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="inst_id[11]">
                                Quincho
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[12]">
                                SUM
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="inst_id[13]">
                                Aire acondicionado
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[14]">
                                Piscina
                            </label>
                        </div>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox" name="inst_id[15]">
                                Alarma
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="inst_id[16]">
                                Sala de juegos
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <hr>

            </fieldset>

            <!-- Finaliza del Segundo Step -->

            <!-- Comienzo del Tercer Step -->

            <fieldset title="Multimedia">
                <legend>Multimedia</legend>


                <h3 class="admin-subtitle-form">Agregar fotos</h3>
                <div class="row">
                    <div class="col-xs-12">
                        {{--<div class="dropzone">
                            <div class="upload-images fallback">
                                <input name="file" type="file" multiple />
                                <span><i class="fa fa-plus-circle"></i> Agregar Imágenes</span>
                            </div>
                        </div>--}}


                        <div class="dropzone" id="dropzoneFileUpload">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="help-upload-images">
                            Peso máximo por imagen: 1mb<br/>
                            Tamaño recomendado: 850 x 520 pixeles<br/>
                            Extensiones permitidas: jpg, jpeg.<br/>
                            Puede reordenar las imágenes luego en el panel.
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="tooltip-upload-images">
                            <p>
                                <b>IMPORTANTE</b><br/>
                                Los usuarios quieren ver los avisos con fotos. Subí tu foto y aumenta la cantidad de
                                visitas.
                            </p>
                            <p>
                                <b>SI TU AVISO ES GRATUITO</b><br/>
                                Sólo se verá la primera foto cargada. Para que tu aviso tenga mas fotos y más visitas,
                                destaca tu aviso.
                            </p>
                        </div>
                    </div>
                </div>
                <h3 class="admin-subtitle-form">Agregar un video</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">URL del video</label>
                            <input type="text" id="barrio" class="form-control"
                                   placeholder="Ej: https://youtu.be/vVXIK1xCRpY" name="video"/>
                            <p class="help-block hidden-lg hidden-sm hidden-md">Copiá y pegá la url del video de youtube
                                que quieras incluir</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p class="help-inline" style="padding-top:7px">Copiá y pegá la url del video de youtube que
                                quieras incluir</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="#"><i class="fa fa-plus-circle"></i> Agregar otro video</a>
                        </div>
                    </div>
                </div>
                <br>
                <hr>


            </fieldset>

            <!-- Finaliza del Tercer Step -->

            <!-- Comienzo del Cuarto Step -->

            <fieldset title="Publicar">
                <legend>Publicar</legend>


            </fieldset>

            <!-- Finaliza del Cuarto Step -->

            <input name="asdad" type="submit" class="btn btn-primary align_right finish" value="Publicar"/>

            {!! Form::close() !!}

        </div>
    </section>

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/jquery.stepy.min.js') }}"></script>

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANOg3-3H-MLuB41LNOWjXk4odKElExnkA&libraries=places"></script>

    <script type="text/javascript" src="{{ asset('js/jquery.geocomplete.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/validate_propiedad.js') }}"></script>

    <script>
        $(function () {

            $("#geocomplete").geocomplete({
                map: ".map_canvas",
                location: [-32.409938, -63.241176],
                details: "form",
                types: ["geocode", "establishment"]
            });

            $("#find").click(function () {
                $("#geocomplete").trigger("geocode");
            });
        });


    </script>

    <script type="text/javascript">
        $(function () {

            var formulario = $('.custom');

            formulario.stepy({
                backLabel: 'Anterior',
                block: true,
                errorImage: false,
                nextLabel: 'Siguente',
                titleClick: true,
                validate: true,
                description: false
                /*                next: function(index) {
                 if(formulario.valid()){
                 alert('Se guarda en base de datos para ir al step anterior los datos del index' + index);
                 }

                 },
                 back: function(index) {
                 if(formulario.valid()){
                 alert('Se guarda en base de datos los datos para ir al step siguiente del index' + index);
                 }
                 },
                 finish: function(index) {
                 if(formulario.valid()){
                 alert('Se guarda en base de datos los datos finales del index' + index);
                 }
                 }*/


            });

            //$('.button-back').hide();

            //$('.button-back').remove();

        });
    </script>

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
        var prop_id = $('input:hidden[name=prop_id]').val();

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/propiedad/uploadFiles",
            addRemoveLinks: true,
            maxFilesize: 4, // MB
            maxFiles: 5,
            paramName: "file", // The name that will be used to transfer the file
            acceptedFiles: ".jpeg,.jpg,.png",
            dictDefaultMessage: "<i class='fa fa-plus-circle'></i>Agregar Imágenes",
            dictFallbackMessage: "Su navegador no admite archivos subidos por drag'n'drop.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictCancelUpload: "Cancelar la subida",
            dictCancelUploadConfirmation: "¿Seguro que quieres cancelar esta subida?",
            dictRemoveFile: "Remover Archivo",
            dictMaxFilesExceeded: "No puedes subir más archivos.",
            params: {
                _token: token,
                prop_id: prop_id
            }

        });
    </script>

@endsection