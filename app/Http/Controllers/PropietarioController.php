<?php

namespace App\Http\Controllers;

use App\Entities\Persona;
use App\Entities\Propietario;
use App\Entities\Utilities;
use App\Repositories\PersonaRepository;
use App\Repositories\PropiedadRepository;
use App\Repositories\PropietarioRepository;
use App\Repositories\ProvinciaRepository;
use Faker\Provider\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $propietarioRepository;

    public function __construct(PropietarioRepository $propietarioRepository, PersonaRepository $personaRepository)
    {
        $this->middleware('auth');
        $this->propietarioRepository = $propietarioRepository;
    }

    public function index()
    {

        $idlocal_comercial = Utilities::getLocalComercialId();
        $email_local_comercial = Utilities::getLocalComercialEmail();

        $propietarios = $this->propietarioRepository->getPropietarioAll($idlocal_comercial);

        return view('/propietario/listado', compact('propietarios', 'email_local_comercial'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dump($request->input());
        //dd();

        $idlocal_comercial = Utilities::getLocalComercialId();
        $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();

        $modal_email = $request->input('modal_email');
        $tipo = 'Propietario';

        if ($modal_email == 1) {

            Utilities::envioMail($request, $tipo);

        } else {


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

                if ($persona->save()) {

                    $idpersona = $persona->per_id;

                    $propietario = New Propietario();
                    $propietario->propietario_nombre = $request->input('per_apellido');
                    $propietario->per_id = $idpersona;
                    $propietario->propietario_fechacarga = $datetime_now;
                    $propietario->comer_id = $idlocal_comercial;
                    $propietario->save();

                }

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


        }

        return redirect('/propietario');


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

        if ($idmodal == 1) {
            $name_tipo_botom_superior = $request->input('name_tipo_botom_superior');

            if ($name_tipo_botom_superior == 'eliminar') {

                foreach ($request['check'] as $index => $value) {
                    $persona = Persona::find($index);
                    $persona->est_id = 9;
                    $persona->save();
                }

            } elseif ($name_tipo_botom_superior == 'exportar_excel') {

                Excel::create('Exportación Excel', function ($excel) use ($request) {

                    $excel->setTitle('Inmobit');

                    $excel->setCreator('Inmobit')
                        ->setCompany('Inmobit');

                    $excel->setDescription('Inmobit');

                    $excel->sheet('Exportación Excel', function ($sheet) use ($request) {

                        $array = [];

                        foreach ($request['check'] as $index => $value) {

                            $propietarios = $this->propietarioRepository->getPropietarioExportacion($index);

                            foreach ($propietarios as $propietario) {

                                $array[] = $propietario;

                            }

                        }

                        $data = json_decode(json_encode($array), true);

                        $sheet->fromArray($data);

                        // Utilizo prependRow para agregar una fila en primer lugar

                        $sheet->prependRow(array('Exportación Excel Propietarios'));

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

        } else {


            $idtipo = $request->input('idtipo');

            $idpersona = $request->input('per_id');

            if ($idtipo == 1) {

                $persona = Persona::find($idpersona);
                $persona->per_apellido = $request->input('per_apellido');
                $persona->per_nombre = $request->input('per_nombre');
                $persona->per_dni = $request->input('per_dni');
                $persona->per_email = $request->input('per_email');
                $persona->per_tel_fijo = $request->input('per_tel_fijo');
                $persona->per_tel_cel = $request->input('per_tel_cel');
                $persona->per_domicilio = $request->input('per_domicilio');
                $persona->loc_id = 1;
                $persona->est_id = 8;
                $persona->catper_id = 1;
                $persona->save();

            } else {

                $persona = Persona::find($idpersona);
                $persona->est_id = 9;
                $persona->save();

            }

        }

        return redirect('/propietario');

    }


    public function filtroPropietario($buscador = 0)
    {

        if ($buscador == "0") {
            $buscador = '';
        }

        $propietario = Propietario::getPropietarioFiltro($buscador);

        if (empty($propietario)) {

            return Response()->json(['data' => 0]);

        } else {

            return Response()->json(['data' => $propietario]);
        }


    }


}
