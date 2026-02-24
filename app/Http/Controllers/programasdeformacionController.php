<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class programasdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programasdeformacion = DB :: table('tbl_programasdeformacion')

            ->GET();
       // dd($programasdeformacion);

        return view('Programas.index', compact('programasdeformacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programas.create');
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
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Programas = new programasdeformacion();
        $Programas->codigo = $request->codigo;
        $Programas->denominacion = $request->denominacion;
        $Programas->observaciones = $request->observaciones;

        $Programas->save();


        return redirect()->route('programas.create');

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
