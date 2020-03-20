<?php

namespace App\Http\Controllers;

use App\Entities\NumeroAmbiente;
use App\Entities\Persona;
use App\Entities\Propiedad;
use App\Entities\Propietario;
use App\Entities\Tasacion;
use App\Entities\Utilities;
use App\Repositories\LocalidadRepository;
use App\Repositories\MonedaRepository;
use App\Repositories\NumeroAmbienteRepository;
use App\Repositories\NumeroBanioRepository;
use App\Repositories\NumeroHabitacionRepository;
use App\Repositories\ProvinciaRepository;
use App\Repositories\TasacionRepository;
use App\Repositories\TipoInmuebleRepository;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class TasacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $tasacionRepository,$tipoInmuebleRepository,$provinciaRepository,$localidadRepository,$monedaRepository,
        $numeroAmbienteRepository,$numeroHabitacionRepository,$numeroBanioRepository;

    public function __construct(TasacionRepository $tasacionRepository, TipoInmuebleRepository $tipoInmuebleRepository,
                ProvinciaRepository $provinciaRepository, LocalidadRepository $localidadRepository,
                MonedaRepository $monedaRepository, NumeroAmbienteRepository $numeroAmbienteRepository,
                NumeroHabitacionRepository $numeroHabitacionRepository, NumeroBanioRepository $numeroBanioRepository)
    {
        $this->middleware('auth');
        $this->tasacionRepository = $tasacionRepository;
        $this->tipoInmuebleRepository = $tipoInmuebleRepository;
        $this->provinciaRepository = $provinciaRepository;
        $this->localidadRepository = $localidadRepository;
        $this->monedaRepository = $monedaRepository;
        $this->numeroAmbienteRepository = $numeroAmbienteRepository;
        $this->numeroHabitacionRepository = $numeroHabitacionRepository;
        $this->numeroBanioRepository = $numeroBanioRepository;


    }

    public function index()
    {

        $idlocal_comercial = Utilities::getLocalComercialId();
        $email_local_comercial = Utilities::getLocalComercialEmail();

        $tasaciones = $this->tasacionRepository->getTasacionAll($idlocal_comercial);

        $tipoinmueble = $this->tipoInmuebleRepository->getTipoInmuebleAll();
        $provincia = $this->provinciaRepository->getProvinciaAll();
        $localidad = $this->localidadRepository->getLocalidadAll();
        $moneda = $this->monedaRepository->getMonedaAll();

        $numerohabitacion = $this->numeroHabitacionRepository->getNumeroHabitacionAll();
        $numeroambiente = $this->numeroAmbienteRepository->getNumeroAmbienteAll();
        $numerobanio = $this->numeroBanioRepository->getNumeroBanioAll();


        return view('/tasacion/listado', compact('tasaciones','tipoinmueble','provincia','localidad',
            'moneda','numerohabitacion','numeroambiente','numerobanio','email_local_comercial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dump($request->input());
        //dd();

        $idlocal_comercial = Utilities::getLocalComercialId();

        $modal_email = $request->input('modal_email');
        $tipo = 'Tasacion';

        if ($modal_email == 1) {

            Utilities::envioMail($request, $tipo);

        } else {

            $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();

            $dni = $request->input('per_dni');

            $persona = Persona::where('per_dni', '=', $dni)->get();

            if ($persona->count() == 0) {

                $persona = New Persona();
                $persona->per_apellido = $request->input('per_apellido');
                $persona->per_nombre = $request->input('per_nombre');
                $persona->per_dni = $request->input('per_dni');
                $persona->per_email = $request->input('per_email');
                $persona->per_tel_fijo = $request->input('per_tel_fijo');
                $persona->per_tel_cel = $request->input('per_tel_cel');
                $persona->per_domicilio = $request->input('per_domicilio');
                $persona->per_fechacarga = $datetime_now;
                $persona->loc_id = 1;
                $persona->est_id = 8;
                $persona->catper_id = 1;
                $persona->per_tasacion = 1;
                $persona->save();

            } else {

                $persona = Persona::where('per_dni', '=', $dni)->first();
                $persona->per_apellido = $request->input('per_apellido');
                $persona->per_nombre = $request->input('per_nombre');
                $persona->per_dni = $request->input('per_dni');
                $persona->per_email = $request->input('per_email');
                $persona->per_tel_fijo = $request->input('per_tel_fijo');
                $persona->per_tel_cel = $request->input('per_tel_cel');
                $persona->per_domicilio = $request->input('per_domicilio');
                $persona->per_fechacarga = $datetime_now;
                $persona->loc_id = 1;
                $persona->est_id = 8;
                $persona->catper_id = 1;
                $persona->per_tasacion = 1;
                $persona->save();

            }

            if ($persona->save())
            {

                $idpersona = $persona->per_id;

                $propietario = New Propietario();
                $propietario->propietario_nombre = $request->input('per_apellido');
                $propietario->per_id = $idpersona;
                $propietario->propietario_fechacarga = $datetime_now;
                $propietario->comer_id = $idlocal_comercial;
                $propietario->save();

                if ($propietario->save())
                {

                    $idpropietario = $propietario->propietario_id;

                    $propiedad = New Propiedad();
                    $propiedad->prop_dim_construido = $request->input('prop_dim_construido');
                    $propiedad->prop_dim_total = $request->input('prop_dim_total');
                    $propiedad->tipoinmu_id = $request->input('tipoinmu_id');
                    $propiedad->tipopera_id = 1;
                    $propiedad->numamb_id = $request->input('numamb_id');
                    $propiedad->hab_id = $request->input('hab_id');
                    $propiedad->ban_id = $request->input('ban_id');
                    $propiedad->loc_id = $request->input('loc_id');
                    $propiedad->est_id = 1;
                    $propiedad->propietario_id = $idpropietario;
                    $propiedad->prop_fechacarga = $datetime_now;
                    $propiedad->save();


                    if($propiedad->save())
                    {

                        $idpropiedad = $propiedad->prop_id;

                        $tasacion = New Tasacion();
                        $tasacion->tas_fechacarga = $datetime_now;
                        $tasacion->tas_fecha = $datetime_now;
                        $tasacion->tas_descripcion = $request->input('tas_descripcion');
                        $tasacion->tas_valor_venta = $request->input('tas_valor_venta');
                        $tasacion->tas_valor_alq = $request->input('tas_valor_alq');
                        $tasacion->tas_valor_alq_temp = $request->input('tas_valor_alq_temp');
                        $tasacion->tas_valor_tasacion = $request->input('tas_valor_tasacion');
                        $tasacion->est_id= 10;
                        $tasacion->mon_id= $request->input('mon_id');
                        $tasacion->prop_id= $idpropiedad;
                        $tasacion->comer_id = $idlocal_comercial;
                        $tasacion->tas_exp = $request->input('tas_exp');
                        $tasacion->save();

                    }

                }

            }


        }



        return redirect('/tasacion');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dump($request->input());
        //dd();

        $idlocal_comercial = Utilities::getLocalComercialId();

        $idmodal = $request->input('idmodal');

        if($idmodal == 1)
        {
            $name_tipo_botom_superior = $request->input('name_tipo_botom_superior');

            if ($name_tipo_botom_superior == 'eliminar'){

                foreach ($request['check'] as $index => $value) {
                    $tasacion = Tasacion::find($index);
                    $tasacion->est_id= 11;
                    $tasacion->save();
                }

            }

        } else {

            $idtipo = $request->input('idtipo');

            $idtasacion = $request->input('tas_id');
            $idpropietario = $request->input('propietario_id');
            $idpropiedad = $request->input('prop_id');

            $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();

            if($idtipo == 1){

                $dni = $request->input('per_dni');

                $persona = Persona::where('per_dni', '=', $dni)->get();

                if ($persona->count() == 0) {

                    $persona = New Persona();
                    $persona->per_apellido = $request->input('per_apellido');
                    $persona->per_nombre = $request->input('per_nombre');
                    $persona->per_dni = $request->input('per_dni');
                    $persona->per_email = $request->input('per_email');
                    $persona->per_tel_fijo = $request->input('per_tel_fijo');
                    $persona->per_tel_cel = $request->input('per_tel_cel');
                    $persona->per_domicilio = $request->input('per_domicilio');
                    $persona->per_fechacarga = $datetime_now;
                    $persona->loc_id = 1;
                    $persona->est_id = 8;
                    $persona->catper_id = 1;
                    $persona->per_tasacion = 1;
                    $persona->save();

                } else {

                    $persona = Persona::where('per_dni', '=', $dni)->first();
                    $persona->per_apellido = $request->input('per_apellido');
                    $persona->per_nombre = $request->input('per_nombre');
                    $persona->per_dni = $request->input('per_dni');
                    $persona->per_email = $request->input('per_email');
                    $persona->per_tel_fijo = $request->input('per_tel_fijo');
                    $persona->per_tel_cel = $request->input('per_tel_cel');
                    $persona->per_domicilio = $request->input('per_domicilio');
                    $persona->per_fechacarga = $datetime_now;
                    $persona->loc_id = 1;
                    $persona->est_id = 8;
                    $persona->catper_id = 1;
                    $persona->per_tasacion = 1;
                    $persona->save();

                }

                if ($persona->save())
                {

                    $idpersona = $persona->per_id;

                    $propietario = Propietario::find($idpropietario);
                    $propietario->propietario_nombre = $request->input('per_apellido');
                    $propietario->per_id = $idpersona;
                    $propietario->propietario_fechacarga = $datetime_now;
                    $propietario->comer_id = $idlocal_comercial;
                    $propietario->save();

                    if ($propietario->save())
                    {

                        $propiedad = Propiedad::find($idpropiedad);
                        $propiedad->prop_dim_construido = $request->input('prop_dim_construido');
                        $propiedad->prop_dim_total = $request->input('prop_dim_total');
                        $propiedad->tipoinmu_id = $request->input('tipoinmu_id');
                        $propiedad->tipopera_id = 1;
                        $propiedad->numamb_id = $request->input('numamb_id');
                        $propiedad->hab_id = $request->input('hab_id');
                        $propiedad->ban_id = $request->input('ban_id');
                        $propiedad->loc_id = $request->input('loc_id');
                        $propiedad->est_id = 1;
                        $propiedad->propietario_id = $idpropietario;
                        $propiedad->prop_fechacarga = $datetime_now;
                        $propiedad->save();

                        if($propiedad->save())
                        {

                            $tasacion = Tasacion::find($idtasacion);
                            $tasacion->tas_fechacarga = $datetime_now;
                            $tasacion->tas_fecha = $datetime_now;
                            $tasacion->tas_descripcion = $request->input('tas_descripcion');
                            $tasacion->tas_valor_venta = $request->input('tas_valor_venta');
                            $tasacion->tas_valor_alq = $request->input('tas_valor_alq');
                            $tasacion->tas_valor_alq_temp = $request->input('tas_valor_alq_temp');
                            $tasacion->tas_valor_tasacion = $request->input('tas_valor_tasacion');
                            $tasacion->est_id= 10;
                            $tasacion->mon_id= $request->input('mon_id');
                            $tasacion->prop_id= $idpropiedad;
                            $tasacion->comer_id = $idlocal_comercial;
                            $tasacion->tas_exp = $request->input('tas_exp');
                            $tasacion->save();

                        }

                    }

                }

            }else{

                $tasacion = Tasacion::find($idtasacion);
                $tasacion->tas_fechacarga = $datetime_now;
                $tasacion->est_id= 11;
                $tasacion->save();

            }

        }

        return redirect('/tasacion');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filtroTasacion($fecha_desde = 0, $fecha_hasta = 0, $buscador = 0, $select_ordenar = 0)
    {

        //dump($estado,$tipooperacion,$tipoinmu,$numhab);
        //dd();

        if ($fecha_desde == 0) {
            $fecha_desde = '';
        }

        if ($fecha_hasta == 0) {
            $fecha_hasta = '';
        }

        if ($buscador == "0") {
            $buscador = '';
        }


        $tasacion = Tasacion::getTasacionFiltro($fecha_desde, $fecha_hasta, $buscador, $select_ordenar);


        if (empty($tasacion)) {

            return Response()->json(['data' => 0]);

        } else {

            return Response()->json(['data' => $tasacion]);
        }

        //dump($consulta);
        //dd();

    }

    public function getExportacionTasacionIdPdf($idtasacion)
    {

        $tasacion = $this->tasacionRepository->getTasacionId($idtasacion);

        //dump($tasacion);
        //dd();

        $pdf = PDF::loadView('/tasacion/exportacionpdf_tasid', ['tasacion' => $tasacion]);

        return $pdf->download('tasacion.pdf');

    }
}
