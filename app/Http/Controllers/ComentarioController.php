<?php

namespace App\Http\Controllers;

use App\Entities\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tipo = 'Consulta al Administrador';
        $id = '';
        $idlocal_comercial = Utilities::getLocalComercialId();
        $de_email = Utilities::getLocalComercialEmail();
        $para_email = 'inmobitportal@gmail.com'; //cuenta del administrador
        $asunto_email = 'Consulta al Administrador';
        $cuerpo_text = $request->input('text_consulta');

        Mail::send('template_mail', ['tipo' => $tipo, 'id' => $id, 'de_email' => $de_email,
            'para_email' => $para_email, 'asunto_email' => $asunto_email,
            'cuerpo_text' => $cuerpo_text], function ($msj) use ($para_email) {
            $msj->subject('Enviado de Inmobit');
            $msj->to($para_email);
            //$msj->cc('');
        });

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
