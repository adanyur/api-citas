<?php

namespace App\Http\Controllers;

use App\Email;
use App\Mail\EmailCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $email = new Email();
        $data = $email->email($request->id);
        Mail::to($request->correo)->send(new EmailCita($data));
        return response()->json(['message' => 'Correo enviado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailCita  $emailCita
     * @return \Illuminate\Http\Response
     */
    public function show(EmailCita $emailCita)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmailCita  $emailCita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailCita $emailCita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailCita  $emailCita
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailCita $emailCita)
    {
        //
    }
}
