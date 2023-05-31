<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesion;
use Illuminate\Support\Facades\DB;

class ProfesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $profesiones = DB::table('profesion')
                    ->select('id_profesion','profesion')
                    ->where('profesion','like','%'.$texto.'%')
                    ->orWhere('id_profesion','like','%'.$texto.'%')
                    ->orderBy('id_profesion', 'asc')
                    ->paginate(10);
        return view('profesion.index', compact('profesiones','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesion = new Profesion;
        $profesion->profesion=$request->input('profesiones');
        $profesion->save();
        return redirect()->route('profesion.index');
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
        $profesion = Profesion::findOrFail($id);
        //return $profesion;
        return view('profesion.edit' ,compact('profesion'));
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
        $profesion= Profesion::findOrFail($id);
        $profesion->profesion=$request->input("profesiones");
        $profesion->save();
        return redirect()->route('profesion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesion= Profesion::findOrFail($id);
        $profesion->delete();
        return redirect()->route('profesion.index');
    }
}
