<?php

namespace App\Http\Controllers\Auth;

use App\Entities\LocalComercial;
use App\Entities\Persona;
use App\Entities\PropietarioLocalComercial;
use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Entities\User
     */
    protected function create(array $data)
    {

        $datetime_now = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();

        $persona = Persona::create([
            'per_apellido' => '',
            'per_nombre' => '',
            'per_dni' => '',
            'per_email' => $data['email'],
            'per_tel_fijo' => '',
            'per_tel_cel' => '',
            'per_domicilio' => '',
            'per_fechacarga' => $datetime_now,
            'loc_id' => 1,
            'est_id' => 8,
            'catper_id' => 1,
            'per_tasacion' => 0
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'per_id' => $persona->per_id,
            'tipu_id' => 2,
        ]);


        $propietario_local = PropietarioLocalComercial::create([
            'propcomer_cuit' => '',
            'per_id' => $persona->per_id,
        ]);


        $local_comercial = LocalComercial::create([
            'comer_nombre' => '',
            'comer_direccion' => '',
            'comer_piso' => '',
            'comer_depto' => '',
            'loc_id' => 1,
            'comer_codpostal' => '',
            'comer_tel_fijo' => '',
            'comer_tel_cel' => '',
            'comer_web' => '',
            'comer_email' => '',
            'comer_poseo_web' => 0,
            'comer_imagen' => '',
            'propcomer_id' => $propietario_local->propcomer_id,
            'comer_fechacarga' => $datetime_now,
            'est_id' => 14,
            'user_id' => $user->id,
            'comer_cuit' => '',
        ]);

        return $user;


    }
}
