<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionEmail;
use App\Models\Aplication;
use App\Models\Area;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aplication = Aplication::find($id);
        $responsable = Position::where('area_id', $aplication->area_id)->where('contactable', 'Si')->whereNotNull('email')->first();
        $area = Area::find($aplication->area_id);
        if (!$responsable) {
            return redirect()->back()
                ->with('error', 'No hay un correo registrado del responsable para poder enviar la notificación');
        }

        return view('notifications.create', compact('aplication', 'responsable', 'area'));
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

    public function sendNotification(Request $request)
    {


        if ($request->notification == 1) {
            $responsable = Position::where('area_id', $request->area_id)->whereNotNull('email')->first();
        } else {
            $responsable = Position::where('area_id', $request->area_id)->where('contactable', 'Si')->whereNotNull('email')->first();
        }


        if (!$responsable) {
            return redirect()->back()
                ->with('error', 'No hay un correo registrado del responsable para poder enviar la notificación');
        }


        $request->validate(
            [
                'message' => 'required'
            ],
            [
                'message.required' => 'El campo mensaje no puede estar vacio!'
            ]
        );

        $notification = [
            'message' => $request->message,

        ];

        Mail::to($responsable->email)->send(new NotificacionEmail($notification));
        return redirect()->route('aplications.index')
            ->with('success', 'Notificación enviada a '.$responsable->email);
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

    public function notificationcargo($id)
    {
        $responsable = Position::where('id', $id)->whereNotNull('email')->first();
        if (!$responsable) {
            return redirect()->back()
                ->with('error', 'No hay un correo registrado poder enviar la notificación');
        }
        return view('notifications.create', compact('responsable'));
    }
}
