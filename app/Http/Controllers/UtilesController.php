<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getContratos()
    {
        return view('utiles/contratos');
    }

    public function getFichasTasaciones()
    {
        return view('utiles/fichas_tasaciones');
    }

    public function autocomplete(Request $request)
    {

        $term = $request->input('term');
        $results = array();

        $queries = DB::table('persona')
            ->where('per_apellido', 'LIKE', '%' . $term . '%')
            ->get();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->per_id, 'value' => $query->per_apellido,
                'apellido' => $query->per_apellido, 'nombre' => $query->per_nombre, 'dni' => $query->per_dni,
                'email' => $query->per_email, 'tel_fijo' => $query->per_tel_fijo, 'tel_cel' => $query->per_tel_cel,
                'domicilio' => $query->per_domicilio];
        }

        return Response()->json($results);

    }

}
