<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return view('positions.index',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('positions.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'El campo Cargo es obligatorio!'
            ]
        );

        $position = new Position();
        $position->name = $request->name;
        $position->responsable = $request->responsable;
        $position->phone = $request->phone;
        $position->extension = $request->extension;
        $position->movil = $request->movil;
        $position->email = $request->email;
        $position->location = $request->location;
        $position->area_id = $request->area_id;
        $position->save();

        return redirect()->route('positions.index')
            ->with('success', 'Cargo creado correctamente.');
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
    public function edit(Position $position)
    {
        $areas = Area::all();
        return view('positions.edit',compact('position','areas'));
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
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'El campo Cargo es obligatorio!'
            ]
        );

        $position = Position::find($id);
        $position->name = $request->name;
        $position->contactable = $request->contactable;
        $position->responsable = $request->responsable;
        $position->phone = $request->phone;
        $position->extension = $request->extension;
        $position->movil = $request->movil;
        $position->email = $request->email;
        $position->location = $request->location;
        $position->area_id = $request->area_id;
        $position->update();

        return redirect()->route('positions.index')
            ->with('success', 'Cargo modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')
            ->with('info', 'Cargo eliminado correctamente.');
    }
}
