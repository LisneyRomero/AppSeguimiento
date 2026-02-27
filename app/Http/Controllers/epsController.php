<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class epsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eps = DB :: table('tbl_eps')
           
            ->GET();
       
        return view('eps.index' , compact('eps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numDocumento' => 'required',
            'denominacion' => 'required',
            'observaciones' => 'required'
        ]);

        $Eps = new eps();
        $Eps ->numDocumento = $request->numDocumento;
        $Eps ->denominacion = $request->denominacion;
        $Eps ->observaciones= $request->observaciones;

        $Eps ->save();

        return redirect()-> route('eps.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Buscar por NIS
        $eps = eps::findOrFail($id);

        return view('eps.show',compact('eps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //eps por primary key
        $eps = eps::findOrFail($id);

        //retorna la vista edit con datos 
        return view('eps.edit', compact('eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validacion de campos
        $request->validate([
            'numDocumento' => 'required',
            'denominacion' => 'required',
            'observaciones' => 'required'
        ]);

        //Buscar eps 
        $eps= eps::findOrFail($id);

        //Actualiza solo los campos permitidos
        $eps->update($request->only('numDocumento','denominacion','observaciones'));

        //Redirige a la lista con mensaje de texto
        return redirect()->route ('eps.index')->with('succes', 'Eps actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Buscar la eps por su primary key
        $eps = eps::findOrFail($id);

        //eliminar un registro
        $eps->delete();

        //Redirigir a la lista con mensaje de texto
         return redirect()->route ('eps.index')->with('succes', 'Eps eliminada correctamente');


    }
}
