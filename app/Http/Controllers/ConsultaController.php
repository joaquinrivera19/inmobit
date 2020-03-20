<?php

namespace App\Http\Controllers;

use App\Entities\Consulta;
use App\Entities\Persona;
use App\Entities\Utilities;
use App\Repositories\ConsultaRepository;
use App\Repositories\FormaContactoRepository;
use App\Repositories\PersonaRepository;
use App\Repositories\PropiedadRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Html2Text\Html2Text;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $consultaRepository, $personaRepository, $formaContactoRepository, $propiedadRepository;

    public function __construct(ConsultaRepository $consultaRepository, PersonaRepository $personaRepository,
                                FormaContactoRepository $formaContactoRepository, PropiedadRepository $propiedadRepository)
    {
        $this->middleware('auth');
        $this->consultaRepository = $consultaRepository;
        $this->personaRepository = $personaRepository;
        $this->formaContactoRepository = $formaContactoRepository;
        $this->propiedadRepository = $propiedadRepository;

    }

    public function index()
    {

        $idlocal_comercial = Utilities::getLocalComercialId();
        $email_local_comercial = Utilities::getLocalComercialEmail();

        $consultas = $this->consultaRepository->getConsultaAll($idlocal_comercial);

        return view('/consulta/listado', compact('consultas', 'email_local_comercial'));
    }


    public function getConsultaWeb($idpropiedad)
    {

        $idlocal_comercial = Utilities::getLocalComercialId();
        $email_local_comercial = Utilities::getLocalComercialEmail();

        $consultas = $this->consultaRepository->getConsultaWeb($idlocal_comercial,$idpropiedad);


        return view('/consulta/listado_consulid', compact('consultas', 'email_local_comercial','idpropiedad'));

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
        $modal_email = $request->input('modal_email');
        $tipo = 'Consulta';

        if ($modal_email == 1) {

            Utilities::envioMail($request, $tipo);

        } else {

            $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();

/*            $persona = New Persona();
            $persona->per_apellido = $request->input('per_apellido');
            $persona->per_nombre = $request->input('per_nombre');
            $persona->per_dni = $request->input('per_dni');
            $persona->per_email = $request->input('per_email');
            $persona->per_tel_fijo = $request->input('per_tel_fijo');
            $persona->per_domicilio = $request->input('per_domicilio');
            $persona->per_fechacarga = $datetime_now;
            $persona->loc_id = 1;
            $persona->est_id = 8;
            $persona->catper_id = 1;
            $persona->per_tasacion = 0;
            $persona->save();*/

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
                $persona->per_tasacion = 0;
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
                $persona->per_tasacion = 0;
                $persona->save();

            }


            if ($persona->save()) {

                $idpersona = $persona->per_id;

                $consulta = New Consulta();
                $consulta->cons_mensaje = $request->input('cons_mensaje') != null ? $request->input('cons_mensaje') : '';
                $consulta->cons_fechacarga = $datetime_now;
                $consulta->prop_id = 1;
                $consulta->est_id = 6;
                $consulta->per_id = $idpersona;
                $consulta->cont_id = $request->input('cont_id');
                $consulta->comer_id = $idlocal_comercial;
                $consulta->save();

            }

        }


        return back();
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

        $idmodal = $request->input('idmodal');
        $idlocal_comercial = Utilities::getLocalComercialId();

        if ($idmodal == 1) {
            $name_tipo_botom_superior = $request->input('name_tipo_botom_superior');

            if ($name_tipo_botom_superior == 'eliminar') {

                foreach ($request['check'] as $index => $value) {
                    $consulta = Consulta::find($index);
                    $consulta->est_id = 7;
                    $consulta->save();
                }

            }

        } else {

            $idtipo = $request->input('idtipo');

            $idpersona = $request->input('per_id');
            $idconsulta = $request->input('idconsulta');

            if ($idtipo == 1) {

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
                    $persona->per_tasacion = 0;
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
                    $persona->per_tasacion = 0;
                    $persona->save();

                }

                if ($persona->save()) {

                    $idpersona = $persona->per_id;

                    $consulta = Consulta::find($idconsulta);
                    $consulta->cons_mensaje = $request->input('cons_mensaje') != null ? $request->input('cons_mensaje') : '';
                    $consulta->cons_fechacarga = $datetime_now;
                    $consulta->prop_id = 1;
                    $consulta->est_id = 6;
                    $consulta->per_id = $idpersona;
                    $consulta->cont_id = $request->input('cont_id');
                    $consulta->comer_id = $idlocal_comercial;
                    $consulta->save();

                }

            } else {

                $consulta = Consulta::find($idconsulta);
                $consulta->est_id = 7;
                $consulta->save();

            }

        }


        return back();


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


    public function filtroConsulta($fecha_desde = 0, $fecha_hasta = 0, $buscador = 0, $select_ordenar = 0)
    {

        if ($fecha_desde == 0) {
            $fecha_desde = '';
        }

        if ($fecha_hasta == 0) {
            $fecha_hasta = '';
        }

        if ($buscador == "0") {
            $buscador = '';
        }

        $consulta = Consulta::getConsultaFiltro($fecha_desde, $fecha_hasta, $buscador, $select_ordenar);


        if (empty($consulta)) {

            return Response()->json(['data' => 0]);

        } else {

            return Response()->json(['data' => $consulta]);
        }

    }

    public function getExportacionConsultaIdPdf($idconsulta)
    {

        $consulta = $this->consultaRepository->getConsultaId($idconsulta);

        $pdf = PDF::loadView('/consulta/exportacionpdf_consid', ['consulta' => $consulta]);

        return $pdf->download('consulta.pdf');

    }
}
