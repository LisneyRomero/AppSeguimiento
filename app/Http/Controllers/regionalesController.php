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
    public function index(Request $request)
{
    $buscar = $request->buscar;

    $regionales = DB::table('tbl_regionales')
        ->when($buscar, function ($query, $buscar) {
            return $query->where('denominacion', 'like', "%$buscar%")
                         ->orWhere('codigo', 'like', "%$buscar%");
        })
        ->get();

    return view('regionales.index', compact('regionales'));
}

     /*{
        $regionales = DB :: table('tbl_regionales')
            -> GET ();

        return view('regionales.index' , compact('regionales'));
    }*/

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
        $validated = $request->validate([
    'codigo' => 'required',
    'denominacion' => 'required',
    'observaciones' => 'required'
]);

    Regionales::create($validated);

    return redirect()->route('regionales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Buscar la region por su NIS
    $regionales = regionales::findOrFail($id);

    return view('regionales.show', compact('regionales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busca la region por su primary key (NIS)
    $regionales = regionales::findOrFail($id);

    // Retorna la vista edit con los datos
    return view('regionales.edit', compact('regionales'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de los campos
    $request->validate([
        'codigo' => 'required',
        'denominacion' => 'required',
        'observaciones' => 'required',
    ]);

    // Busca las regionales
    $regionales = regionales::findOrFail($id);

    // Actualiza solo los campos permitidos
    $regionales->update($request->only('codigo', 'denominacion', 'observaciones'));

    // Redirige a la lista con mensaje de éxito
    return redirect()->route('regionales.index')->with('success', 'Regional actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Buscar el programa por su primary key (NIS)
    $regionales = regionales::findOrFail($id);

    // Eliminar el registro
    $regionales->delete();

    // Redirigir a la lista con mensaje de éxito
    return redirect()->route('regionales.index')->with('success', 'Regional eliminado correctamente.');
    
    }
}