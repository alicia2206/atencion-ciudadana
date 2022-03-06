<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('areas.index');
    }

    public function getAreas()
    {
        $areas = Area::with('positions')->select(['*']);

        return Datatables::of($areas)
            ->addColumn('actions', function ($area) {
                $btn =
                    '<button id="editArea"  class="btn btn-xs btn-primary btn-circle" data-id="' . $area->id . '"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button id="deleteArea"  class="btn btn-xs btn-danger btn-circle" data-id="' . $area->id . '"><i class="fa-solid fa-trash-can"></i></button>';
                return $btn;
            })
            ->addColumn('positions', function($area) {
                return $area->positions->count();
            })
            ->rawColumns(['actions','positions'])
            ->make(true);
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
        $area   =   Area::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
            ]
        );

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return response()->json($area);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();
    }
}
