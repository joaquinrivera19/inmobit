<?php

namespace App\Http\Controllers;

use App\Entities\Imagen;
use App\Entities\Persona;
use App\Entities\Propiedad;
use App\Entities\PropiedadXAmbiente;
use App\Entities\PropiedadXInstalacion;
use App\Entities\PropiedadXServicio;
use App\Entities\Propietario;
use App\Entities\Publicacion;
use App\Entities\Utilities;
use App\Repositories\AntiguedadRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\LocalidadRepository;
use App\Repositories\MonedaRepository;
use App\Repositories\NumeroAmbienteRepository;
use App\Repositories\NumeroBanioRepository;
use App\Repositories\NumeroCocheraRepository;
use App\Repositories\NumeroHabitacionRepository;
use App\Repositories\PropiedadRepository;
use App\Repositories\ProvinciaRepository;
use App\Repositories\PublicacionRepository;
use App\Repositories\TipoInmuebleRepository;
use App\Repositories\TipoOperacionRepository;

use Illuminate\Support\Facades\File;
//use Barryvdh\DomPDF\PDF;

use Barryvdh\DomPDF\Facade as PDF;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use function Sodium\add;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $propiedadRepository, $tipoInmuebleRepository, $tipoOperacionRepository, $antiguedadRepository, $numeroHabitacionRepository,
        $numeroCocheraRepository, $numeroAmbienteRepository, $numeroBanioRepository, $monedaRepository, $provinciaRepository,
        $localidadRepository, $estadoRepository, $publicacionRepository;

    public function __construct(PropiedadRepository $propiedadRepository, TipoInmuebleRepository $tipoInmuebleRepository,
                                TipoOperacionRepository $tipoOperacionRepository, AntiguedadRepository $antiguedadRepository,
                                NumeroHabitacionRepository $numeroHabitacionRepository, NumeroCocheraRepository $numeroCocheraRepository,
                                NumeroAmbienteRepository $numeroAmbienteRepository, NumeroBanioRepository $numeroBanioRepository,
                                MonedaRepository $monedaRepository, ProvinciaRepository $provinciaRepository,
                                LocalidadRepository $localidadRepository, EstadoRepository $estadoRepository,
                                PublicacionRepository $publicacionRepository)
    {
        $this->middleware('auth');
        $this->propiedadRepository = $propiedadRepository;
        $this->tipoInmuebleRepository = $tipoInmuebleRepository;
        $this->tipoOperacionRepository = $tipoOperacionRepository;
        $this->antiguedadRepository = $antiguedadRepository;
        $this->numeroHabitacionRepository = $numeroHabitacionRepository;
        $this->numeroCocheraRepository = $numeroCocheraRepository;
        $this->numeroAmbienteRepository = $numeroAmbienteRepository;
        $this->numeroBanioRepository = $numeroBanioRepository;
        $this->monedaRepository = $monedaRepository;
        $this->provinciaRepository = $provinciaRepository;
        $this->localidadRepository = $localidadRepository;
        $this->estadoRepository = $estadoRepository;
        $this->publicacionRepository = $publicacionRepository;
    }

    public function index()
    {

        $idlocal_comercial = Utilities::getLocalComercialId();
        $email_local_comercial = Utilities::getLocalComercialEmail();

        //dump($idlocal_comercial);
        //dd();

        $propiedades = $this->propiedadRepository->getPropiedadAll($idlocal_comercial);
        $estado = $this->estadoRepository->getEstadoPublicacion();
        $tipo_operacion = $this->tipoOperacionRepository->getTipoOperacionAll();
        $tipo_inmueble = $this->tipoInmuebleRepository->getTipoInmuebleAll();
        $num_dormitorio = $this->numeroHabitacionRepository->getNumeroHabitacionAll();
        $authid = Auth::user()->id;

        //dump($propiedades);
        //dd();

        return view('/propiedad/listado', compact('propiedades', 'estado', 'tipo_operacion',
            'tipo_inmueble', 'num_dormitorio','authid','email_local_comercial'));
    }


    public function PropiedadesId($idpropietario,$tipo)
    {

        $idlocal_comercial = Utilities::getLocalComercialId();

        $email_local_comercial = Utilities::getLocalComercialEmail();

        if ($tipo == 'cliente')
        {

            $propiedades = $this->propiedadRepository->getPropiedadClenteId($idpropietario);
            $infopropietario = $this->propiedadRepository->getInfoPropietarioCliente($idpropietario);

        } else {

            $propiedades = $this->propiedadRepository->getPropiedadId($idpropietario, $idlocal_comercial);
            $infopropietario = $this->propiedadRepository->getInfoPropietario($idpropietario);

        }

        $authid = Auth::user()->id;
        $estado = $this->estadoRepository->getEstadoPublicacion();
        $tipo_operacion = $this->tipoOperacionRepository->getTipoOperacionAll();
        $tipo_inmueble = $this->tipoInmuebleRepository->getTipoInmuebleAll();
        $num_dormitorio = $this->numeroHabitacionRepository->getNumeroHabitacionAll();

        //dump($infopropietario);
        //dd();

        return view('/propiedad/listado_propid', compact('propiedades', 'infopropietario', 'estado', 'tipo_operacion',
            'tipo_inmueble', 'num_dormitorio','authid','email_local_comercial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tipoinmueble = $this->tipoInmuebleRepository->getTipoInmuebleAll();
        $tipooperacion = $this->tipoOperacionRepository->getTipoOperacionAll();
        $antiguedad = $this->antiguedadRepository->getAntiguedadAll();
        $numerohabitacion = $this->numeroHabitacionRepository->getNumeroHabitacionAll();
        $numerocochera = $this->numeroCocheraRepository->getNumeroCocheraAll();
        $numeroambiente = $this->numeroAmbienteRepository->getNumeroAmbienteAll();
        $numerobanio = $this->numeroBanioRepository->getNumeroBanioAll();
        $moneda = $this->monedaRepository->getMonedaAll();
        $provincia = $this->provinciaRepository->getProvinciaAll();
        $localidad = $this->localidadRepository->getLocalidadAll();

        $maxidpropiedad = $this->propiedadRepository->getMaxNroPropiedad();// busco el max id de propiedades


        return view('/propiedad/create', compact('tipoinmueble', 'tipooperacion', 'antiguedad',
            'numerohabitacion', 'numerocochera', 'numeroambiente', 'numerobanio', 'moneda', 'provincia', 'localidad',
            'maxidpropiedad'));

        //return view('/propiedad/dropzone');
    }

    public function uploadFiles(Request $request)
    {

        $rules = array(
            'file' => 'image|max:3000',
        );

        //$validation = /Validator::make($input, $rules);
        //if ($validation->fails()) {
        //return Response::make($validation->errors->first(), 400);
        //}

        //dump($request->input());
        //dd();

        $idpropiedad = $request->input('prop_id');

        $authid = Auth::user()->id;

        $file = $request->file('file');
        $path = public_path() . '/uploads/usuario' . $authid . '/propiedad' . $idpropiedad;

        $fileName = uniqid() . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $size = $file->getClientSize();

        $upload_success = $file->move($path, $fileName);

        $propimagen = new Imagen();
        $propimagen->img_url = pathinfo($fileName, PATHINFO_BASENAME);
        $propimagen->prop_id = $idpropiedad; //lo tendria que cargar cuando gurdar la propiedad
        $propimagen->img_formato = $extension;
        $propimagen->img_path = $fileName;
        $propimagen->img_size = $size;
        $propimagen->save();

        if ($upload_success) {
            return response()->json([
                'success' => '200'
            ]);
        } else {
            return response()->json([
                'error' => '400'
            ]);
        }


    }

    public function getServerImages($idpropiedad)
    {

        $images = Imagen::where('prop_id','=',$idpropiedad)->get();

        $imageAnswer = [];

        foreach ($images as $image) {
            $imageAnswer[] = [
                'original' => $image->img_url,
                'server' => $image->img_url,
                'size' => $image->img_size,
            ];
        }

        return response()->json([
            'images' => $imageAnswer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idlocal_comercial = Utilities::getLocalComercialId();
        $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();


        $modal_email = $request->input('modal_email');
        $tipo = 'Propiedad';

        if ($modal_email == 1) {

            Utilities::envioMail($request, $tipo);

        } else {

            $persona = New Persona();
            $persona->per_apellido = $request->input('per_apellido');
            $persona->per_nombre = $request->input('per_nombre');
            $persona->per_dni = $request->input('per_dni');
            $persona->per_email = $request->input('per_email');
            //$persona->per_tel_fijo = $request->input('per_tel_fijo');
            $persona->per_tel_cel = $request->input('per_tel_cel');
            $persona->per_domicilio = $request->input('per_domicilio');
            $persona->per_fechacarga = $datetime_now;
            $persona->loc_id = 1;
            $persona->est_id = 8;
            $persona->catper_id = 1;
            $persona->save();

            if ($persona->save()) {

                $idpersona = $persona->per_id;

                $propietario = New Propietario();
                $propietario->propietario_nombre = $request->input('per_apellido');
                $propietario->per_id = $idpersona;
                $propietario->propietario_fechacarga = $datetime_now;
                $propietario->comer_id = $idlocal_comercial;
                $propietario->save();

                if ($propietario->save()) {

                    $idpropietario = $propietario->propietario_id;

                    $propiedad = New Propiedad();
                    $propiedad->prop_dim_construido = $request->input('prop_dim_construido');
                    $propiedad->prop_dim_total = $request->input('prop_dim_total');
                    $propiedad->prop_direccion = $request->input('prop_direccion');
                    $propiedad->cochera_id = $request->input('cochera_id');
                    $propiedad->tipoinmu_id = $request->input('tipoinmu_id');
                    $propiedad->tipopera_id = $request->input('tipopera_id');
                    $propiedad->numamb_id = $request->input('numamb_id');
                    $propiedad->hab_id = $request->input('hab_id');
                    $propiedad->ban_id = $request->input('ban_id');
                    $propiedad->loc_id = 1;
                    $propiedad->est_id = 1;
                    $propiedad->propietario_id = $idpropietario;
                    $propiedad->prop_comision = $request->input('prop_comision');
                    $propiedad->antig_id = $request->input('antig_id');
                    //$propiedad->prop_ocupada = $request->input('prop_ocupada');
                    $propiedad->mon_id = $request->input('mon_id');
                    $propiedad->prop_valor = $request->input('prop_valor');
                    //$propiedad->prop_valor_oculto = $request->input('prop_valor_oculto');
                    //$propiedad->prop_confidencial = $request->input('prop_confidencial');
                    $propiedad->prop_fechacarga = $datetime_now;
                    $propiedad->save();

                    if ($propiedad->save()) {

                        $idpropiedad = $propiedad->prop_id;

                        $publicacion = New Publicacion();
                        $publicacion->pub_fechacarga = $datetime_now;
                        $publicacion->pub_titulo = $request->input('pub_titulo');
                        $publicacion->pub_descripcion = $request->input('pub_descripcion');
                        //$publicacion->pub_fechavenc = $request->input('pub_descripcion');
                        $publicacion->prop_id = $idpropiedad;
                        $publicacion->est_id = 1;
                        $publicacion->aviso_id = 1;
                        $publicacion->abono_id = 1;
                        $publicacion->comer_id = $idlocal_comercial;
                        $publicacion->save();


                        $idprop = $propiedad->prop_id;

                        if ($request->serv_id) {

                            foreach ($request->serv_id as $key => $v) {

                                $pxs = new PropiedadXServicio();
                                $pxs->serv_id = $key;
                                $pxs->prop_id = $idprop;
                                $pxs->pxs_habilitado = $request->serv_id[$key];
                                $pxs->save();

                            }

                        }


                        if ($request->amb_id) {

                            foreach ($request->amb_id as $key => $v) {

                                $pxa = new PropiedadXAmbiente();
                                $pxa->amb_id = $key;
                                $pxa->prop_id = $idprop;
                                $pxa->pxa_habilitado = $request->amb_id[$key];
                                $pxa->save();

                            }

                        }

                        if ($request->inst_id) {

                            foreach ($request->inst_id as $key => $v) {

                                $pxi = new PropiedadXInstalacion();
                                $pxi->inst_id = $key;
                                $pxi->prop_id = $idprop;
                                $pxi->pxi_habilitado = $request->inst_id[$key];
                                $pxi->save();

                            }

                        }


                    }

                }

            }

        }

        return redirect('/propiedad');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion = $this->publicacionRepository->getPublicacionId($id);

        $tipoinmueble = $this->tipoInmuebleRepository->getTipoInmuebleAll();
        $tipooperacion = $this->tipoOperacionRepository->getTipoOperacionAll();
        $antiguedad = $this->antiguedadRepository->getAntiguedadAll();
        $numerohabitacion = $this->numeroHabitacionRepository->getNumeroHabitacionAll();
        $numerocochera = $this->numeroCocheraRepository->getNumeroCocheraAll();
        $numeroambiente = $this->numeroAmbienteRepository->getNumeroAmbienteAll();
        $numerobanio = $this->numeroBanioRepository->getNumeroBanioAll();
        $moneda = $this->monedaRepository->getMonedaAll();
        $provincia = $this->provinciaRepository->getProvinciaAll();
        $localidad = $this->localidadRepository->getLocalidadAll();

        $servicios = $this->propiedadRepository->getServicioIdPublicacion($publicacion->prop_id)->toArray();
        $ambientes = $this->propiedadRepository->getAmbienteIdPublicacion($publicacion->prop_id)->toArray();
        $instalaciones = $this->propiedadRepository->getInstalacionIdPublicacion($publicacion->prop_id)->toArray();

        $authid = Auth::user()->id;

        return view('/propiedad/edit', compact('publicacion', 'tipoinmueble', 'tipooperacion', 'antiguedad',
            'numerohabitacion', 'numerocochera', 'numeroambiente', 'numerobanio', 'moneda', 'provincia', 'localidad',
            'servicios','ambientes','instalaciones','authid'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dump($request->input());
        //dd();

        $idlocal_comercial = Utilities::getLocalComercialId();
        $idmodal = $request->input('idmodal');

        if ($idmodal == 1)
        {
            $name_tipo_botom_superior = $request->input('name_tipo_botom_superior');

            if ($name_tipo_botom_superior == 'eliminar') {

                foreach ($request['check'] as $index => $value) {
                    $publicacion = Publicacion::find($index);
                    $publicacion->est_id = 16;
                    $publicacion->save();
                }

            } elseif ($name_tipo_botom_superior == 'exportar_excel') {

                Excel::create('Exportación Excel', function ($excel) use ($request) {

                    $excel->setTitle('Inmobit');

                    $excel->setCreator('Inmobit')
                        ->setCompany('Inmobit');

                    $excel->setDescription('Inmobit');

                    $excel->sheet('Exportación Excel', function($sheet) use ($request) {

                        $array = [];

                        foreach ($request['check'] as $index => $value) {

                            $publicaciones = $this->propiedadRepository->getPropiedadExportacion($index);

                            foreach ($publicaciones as $publicacion){

                                $array[] = $publicacion;

                            }

                        }

                        $data = json_decode(json_encode($array), true);

                        $sheet->fromArray($data);

                        // Utilizo prependRow para agregar una fila en primer lugar

                        $sheet->prependRow(array('Exportación Excel Propiedades'));

                        // Utilizo setFont para editar la celda

                        $sheet->cell('A1', function ($cells) {

                            $cells->setFont(array(
                                'family' => 'Calibri',
                                'size' => '16',
                                'bold' => true
                            ));

                        });

                        // Utilizo mergeCells para combinar las celdas

                        $sheet->mergeCells('A1:I1');

                    });

                })->export('xls');


            } elseif ($name_tipo_botom_superior == 'cambiar_estados') {

                $estado = $request->input('est_id');

                foreach ($request['check'] as $index => $value) {
                    $publicacion = Publicacion::find($index);
                    $publicacion->est_id = $estado;
                    $publicacion->save();
                }


            } elseif ($name_tipo_botom_superior == 'enviar_fichas') {


                $url_propiedades = "<ul><li>" . implode("</li><li>", $request['check']) . "</li></ul>";

                $tipo = 'Propiedad';

                Utilities::envioMail($request, $tipo, $url_propiedades);

            }

        } else {

            $idtipo = $request->input('idtipo');

            $idpublicacion = $request->input('pub_id');

            // ----  Tipo 1 modal_aviso. Tipo 2 modal_estado. Tipo 3 modal_eliminar. Tipo 4 Editar_Propiedad --- //

            if ($idtipo == 1) {

                if ($request->has('aviso_id')) {

                    $publicacion = Publicacion::find($idpublicacion);
                    $publicacion->aviso_id = $request->input('aviso_id');
                    $publicacion->save();

                }

            } elseif ($idtipo == 2) {

                if ($request->has('est_id')) {

                    $publicacion = Publicacion::find($idpublicacion);
                    $publicacion->est_id = $request->input('est_id');
                    $publicacion->save();

                }

            } elseif ($idtipo == 3) {

                $publicacion = Publicacion::find($idpublicacion);

                // -- est_id 16 significa estado eliminado -- //

                $publicacion->est_id = 16;
                $publicacion->save();

            } elseif ($idtipo == 4) {

                $idpropiedad = $request->input('prop_id');
                $idpropietario = $request->input('propietario_id');
                $idpersona = $request->input('per_id');

                $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();

                $persona = Persona::where('persona.per_id', '=', $idpersona)->first();
                $persona->per_apellido = $request->input('per_apellido');
                $persona->per_nombre = $request->input('per_nombre');
                $persona->per_dni = $request->input('per_dni');
                $persona->per_email = $request->input('per_email');
                //$persona->per_tel_fijo = $request->input('per_tel_fijo');
                $persona->per_tel_cel = $request->input('per_tel_cel');
                $persona->per_domicilio = $request->input('per_domicilio');
                $persona->per_fechacarga = $datetime_now;
                $persona->loc_id = 1;
                $persona->est_id = 8;
                $persona->catper_id = 1;
                $persona->save();

                if ($persona->save()) {

                    $propietario = Propietario::where('propietario.propietario_id', '=', $idpropietario)->first();
                    $propietario->propietario_nombre = $request->input('per_apellido');
                    $propietario->per_id = $idpersona;
                    $propietario->propietario_fechacarga = $datetime_now;
                    $propietario->comer_id = $idlocal_comercial;
                    $propietario->save();

                    if ($propietario->save()) {

                        $propiedad = Propiedad::where('propiedad.prop_id', '=', $idpropiedad)->first();
                        $propiedad->prop_dim_construido = $request->input('prop_dim_construido');
                        $propiedad->prop_dim_total = $request->input('prop_dim_total');
                        $propiedad->prop_direccion = $request->input('prop_direccion');
                        $propiedad->cochera_id = $request->input('cochera_id');
                        $propiedad->tipoinmu_id = $request->input('tipoinmu_id');
                        $propiedad->tipopera_id = $request->input('tipopera_id');
                        $propiedad->numamb_id = $request->input('numamb_id');
                        $propiedad->hab_id = $request->input('hab_id');
                        $propiedad->ban_id = $request->input('ban_id');
                        $propiedad->loc_id = 1;
                        $propiedad->est_id = 1;
                        $propiedad->propietario_id = $idpropietario;
                        $propiedad->prop_comision = $request->input('prop_comision');
                        $propiedad->antig_id = $request->input('antig_id');
                        //$propiedad->prop_ocupada = $request->input('prop_ocupada');
                        $propiedad->mon_id = $request->input('mon_id');
                        $propiedad->prop_valor = $request->input('prop_valor');
                        //$propiedad->prop_valor_oculto = $request->input('prop_valor_oculto');
                        //$propiedad->prop_confidencial = $request->input('prop_confidencial');
                        $propiedad->prop_fechacarga = $datetime_now;
                        $propiedad->save();

                        if ($propiedad->save()) {

                            $publicacion = Publicacion::where('publicacion.pub_id', '=', $idpublicacion)->first();
                            $publicacion->pub_fechacarga = $datetime_now;
                            $publicacion->pub_titulo = $request->input('pub_titulo');
                            $publicacion->pub_descripcion = $request->input('pub_descripcion');
                            //$publicacion->pub_fechavenc = $request->input('pub_descripcion');
                            $publicacion->prop_id = $idpropiedad;
                            $publicacion->est_id = 1;
                            $publicacion->aviso_id = 1;
                            $publicacion->abono_id = 1;
                            $publicacion->comer_id = $idlocal_comercial;
                            $publicacion->save();


                        }

                    }

                }


            }

        }


        return redirect('/propiedad');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filtroPublicacion($estado = 0, $tipooperacion = 0, $tipoinmu = 0, $numhab = 0, $buscador = 0, $select_ordenar = 0)
    {

        //dump($estado,$tipooperacion,$tipoinmu,$numhab);
        //dd();

        if ($estado == 0) {
            $estado = '';
        }

        if ($tipooperacion == 0) {
            $tipooperacion = '';
        }

        if ($tipoinmu == 0) {
            $tipoinmu = '';
        }

        if ($numhab == 0) {
            $numhab = '';
        }

        if ($buscador == "0") {
            $buscador = '';
        }


        $propiedad = Publicacion::getPublicacionFiltro($estado, $tipooperacion, $tipoinmu, $numhab, $buscador, $select_ordenar);


        if (empty($propiedad)) {

            return Response()->json(['data' => 0]);

        } else {

            return Response()->json(['data' => $propiedad]);
        }

        //dump($propiedad);
        //dd();

    }

    public function getExportacionPropiedadIdExcel($idpublicacion)
    {
        Excel::create('Exportación Excel', function ($excel) use ($idpublicacion) {

            $excel->setTitle('Inmobit');

            $excel->setCreator('Inmobit')
                ->setCompany('Inmobit');

            $excel->setDescription('Inmobit');

            $excel->sheet('Exportación Excel', function($sheet) use ($idpublicacion) {

                $publicaciones = $this->propiedadRepository->getPropiedadExportacion($idpublicacion);

                $data = json_decode(json_encode($publicaciones), true);

                $sheet->fromArray($data);

                // Utilizo prependRow para agregar una fila en primer lugar

                $sheet->prependRow(array('Exportación Excel Propiedad'));

                // Utilizo setFont para editar la celda

                $sheet->cell('A1', function ($cells) {

                    $cells->setFont(array(
                        'family' => 'Calibri',
                        'size' => '16',
                        'bold' => true
                    ));

                });

                // Utilizo mergeCells para combinar las celdas

                $sheet->mergeCells('A1:I1');

            });

        })->export('xls');
    }

    public function getExportacionPropiedadIdPdf($idpublicacion)
    {

        $idlocal_comercial = Utilities::getLocalComercialId();

        $publicacion = $this->propiedadRepository->getPropiedadIdPdf($idpublicacion,$idlocal_comercial);

        $servicios = $this->propiedadRepository->getServicioIdPublicacion($idpublicacion)->toArray();
        $ambientes = $this->propiedadRepository->getAmbienteIdPublicacion($idpublicacion)->toArray();
        $instalaciones = $this->propiedadRepository->getInstalacionIdPublicacion($idpublicacion)->toArray();

        $pdf = PDF::loadView('/propiedad/exportacionpdf_propid', ['publicacion' => $publicacion,'servicios' => $servicios,
            'ambientes' => $ambientes, 'instalaciones' => $instalaciones]);

        return $pdf->download('propiedad.pdf');

    }

}
