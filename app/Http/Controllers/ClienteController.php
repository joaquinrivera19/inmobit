<?php

namespace App\Http\Controllers;

use App\Entities\LocalComercial;
use App\Entities\Persona;
use App\Entities\PropietarioLocalComercial;
use App\Entities\User;
use App\Entities\Utilities;
use App\Http\Requests\CreatePersonaRequest;
use App\Repositories\LocalComercialRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $localComercialRepository;

    public function __construct(LocalComercialRepository $localComercialRepository)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->localComercialRepository = $localComercialRepository;
    }

    public function index()
    {

        $email_local_comercial = Utilities::getLocalComercialEmail();

        $clientes = $this->localComercialRepository->getLocalComercialAll();

        /*        dump($clientes);
                dd();*/

        return view('/cliente/listado', compact('clientes', 'email_local_comercial'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePersonaRequest $request)
    {

        //dump($request->input());
        //dd();

        $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();

        $tipo = 'Cliente';

        if ($request->input('modal_email')) {

            $modal_email = $request->input('modal_email');

            Utilities::envioMail($request, $tipo);

        } else {

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

                $user = New User();
                $user->name = $request->input('per_nombre');
                $user->email = $request->input('per_email');
                $user->password = $request->input('password');
                $user->per_id = $idpersona;
                $user->tipu_id = 2;
                $user->save();

                if ($user->save()) {

                    $iduser = $user->id;

                    $prolocal = New PropietarioLocalComercial();
                    $prolocal->propcomer_cuit = '';
                    $prolocal->per_id = $idpersona;
                    $prolocal->save();


                    if ($prolocal->save()) {

                        $propietariolocal = $prolocal->propcomer_id;

                        $locacomercial = New LocalComercial();
                        $locacomercial->comer_nombre = '';
                        $locacomercial->comer_direccion = '';
                        $locacomercial->comer_piso = '';
                        $locacomercial->comer_depto = '';
                        $locacomercial->loc_id = 1;
                        $locacomercial->comer_codpostal = '';
                        $locacomercial->comer_tel_fijo = '';
                        $locacomercial->comer_tel_cel = '';
                        $locacomercial->comer_web = '';
                        $locacomercial->comer_email = '';

                        $locacomercial->comer_poseo_web = 0;
                        $locacomercial->comer_imagen = '';
                        $locacomercial->propcomer_id = $propietariolocal;
                        $locacomercial->comer_fechacarga = $datetime_now;

                        $locacomercial->est_id = 14;
                        $locacomercial->user_id = $iduser;
                        $locacomercial->comer_cuit = '';
                        $locacomercial->save();

                    }
                }

            }


        }

        return redirect('/cliente');

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

                    $local = LocalComercial::find($index);
                    $local->est_id = 15;
                    $local->save();
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

                            //$propietarios = $this->propietarioRepository->getPropietarioExportacion($index);
                            $localescomerciales = $this->localComercialRepository->getLocalComercialAll();

                            foreach ($localescomerciales as $localcomercial) {

                                $array[] = $localcomercial;

                            }

                        }

                        $data = json_decode(json_encode($array), true);

                        $sheet->fromArray($data);

                        // Utilizo prependRow para agregar una fila en primer lugar

                        $sheet->prependRow(array('Exportación Excel Cliente'));

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
            $comer_id = $request->input('comer_id');

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

                $local = LocalComercial::find($comer_id);
                $local->est_id = 15;
                $local->save();

            }

        }

        return redirect('/cliente');

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

    public function filtroCliente($buscador = 0)
    {

        if ($buscador == "0") {
            $buscador = '';
        }

        $localcomercial = LocalComercial::getLocalComercialFiltro($buscador);

        if (empty($localcomercial)) {

            return Response()->json(['data' => 0]);

        } else {

            return Response()->json(['data' => $localcomercial]);
        }


    }

    public function miCuenta($idlocalcomercial)
    {


        return view('cliente/mi_cuenta');
    }
}
