<?php

namespace App\Http\Controllers;

use App\Entities\LocalComercial;
use App\Entities\Persona;
use App\Entities\User;
use App\Entities\Utilities;
use App\Repositories\LocalComercialRepository;
use Illuminate\Http\Request;
use App\Http\Requests\UserEditRequest;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class LocalComercialController extends Controller
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
        $this->localComercialRepository = $localComercialRepository;
    }

    public function index()
    {


        $tipo_user = Auth::user()->tipu_id;
        $iduser = Auth::user()->id;



        if($tipo_user == 1)
        {
            $local_admin = $this->localComercialRepository->getLocalAdmin($iduser);

            return view('/cliente/perfil_admin', compact('local_admin'));

        }else{

            $idlocal_comercial = Utilities::getLocalComercialId();

            $localcomercial = $this->localComercialRepository->getLocalComercialId($idlocal_comercial);

            return view('/cliente/perfil', compact('localcomercial', 'max_nro_local_comercial'));
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function editpassword(Request $request)
    {

        $users = Auth::user();

        return view('/cliente/cambiar_password', compact('users'));

    }


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
    public function store(Request $request)
    {
        //
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {

        $idtipo = $request->input('idtipo');

        $authid = Auth::user()->id;


        if ($idtipo == 2) {

            $users = User::find($authid);
            $users->password = bcrypt($request->input('password'));
            $users->save();

        } else {


            $idpersona = $request->input('per_id');
            $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();
            $tipo_user = Auth::user()->tipu_id;

            if($tipo_user == 1)
            {

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
                $persona->per_tasacion = 0;
                $persona->save();


            } else {


                $idpropcomer = $request->input('propcomer_id');
                $idcomercial = $request->input('comer_id');

                $localcomercial = LocalComercial::where('local_comercial.comer_id', '=', $idcomercial)->first();
                $localcomercial->comer_nombre = $request->input('comer_nombre');
                $localcomercial->comer_direccion = $request->input('comer_direccion');
                $localcomercial->comer_piso = $request->input('comer_piso');
                $localcomercial->comer_depto = $request->input('comer_depto');
                //loc_id
                $localcomercial->comer_codpostal = $request->input('comer_codpostal');
                $localcomercial->comer_tel_fijo = $request->input('comer_tel_fijo');
                $localcomercial->comer_tel_cel = $request->input('comer_tel_cel');
                $localcomercial->comer_web = $request->input('comer_web');
                $localcomercial->comer_email = $request->input('comer_email');

                if ($request->comer_poseo_web) {
                    $localcomercial->comer_poseo_web = $request->input('comer_poseo_web');
                } else {
                    $localcomercial->comer_poseo_web = 0;
                }

                //comer_imagen

                $localcomercial->propcomer_id = $idpropcomer;
                $localcomercial->comer_fechacarga = $datetime_now;
                $localcomercial->est_id = 14;
                $localcomercial->user_id = $authid;
                $localcomercial->comer_cuit = $request->input('comer_cuit');
                $localcomercial->save();

                if ($localcomercial->save()) {

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
                    $persona->per_tasacion = 0;
                    $persona->save();

                }

            }

        }


        return redirect('/perfil');
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

        $idcomercial = $request->input('comer_id');

        $authid = Auth::user()->id;

        $file = $request->file('file');
        $path = public_path() . '/uploads/usuario' . $authid . '/localcomercial';
        $fileName = uniqid() . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $upload_success = $file->move($path, $fileName);

        $propimagen = LocalComercial::where('local_comercial.comer_id', '=', $idcomercial)->first();
        $propimagen->comer_imagen = $fileName;
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
}
