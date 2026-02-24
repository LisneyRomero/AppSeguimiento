<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class regionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = DB :: table('tbl_regionales')
            -> GET ();

        return view('Regionales.index' , compact('regionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regionales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'denominacion' => 'required',
            'observaciones' => 'required'
        ]);

        $Regionales = new regionales();
        $Regionales ->codigo= $request -> codigo;
        $Regionales ->denominacion = $request->denominacion;
        $Regionales->observaciones = $request->observaciones;

        $Regionales->save();
        return redirect()->route('regionales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
