<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use function Laravel\Prompts\select;

class tiposdocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $buscar = $request->buscar;

    $tiposdocumentos = DB::table('tbl_tiposdocumentos')
        ->when($buscar, function ($query, $buscar) {
            return $query->where('observaciones', 'like', "%$buscar%")
                         ->orWhere('denominacion', 'like', "%$buscar%");
        })
        ->get();

    return view('tipodocumentos.index', compact('tiposdocumentos'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tipodocumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
    'denominacion' => 'required',
    'observaciones' => 'required'
]);

    tiposdocumentos::create($validated);

    return redirect()->route('tipodocumentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Buscar la identificacion por su NIS
    $tiposdocumentos = tiposdocumentos::findOrFail($id);

    return view('tipodocumentos.show', compact('tiposdocumentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busca la identificacion por su primary key (NIS)
    $tiposdocumentos = tiposdocumentos::findOrFail($id);

    // Retorna la vista edit con los datos
    return view('tipodocumentos.edit', compact('tiposdocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /// Validación de los campos
    $request->validate([
        'denominacion' => 'required',
        'observaciones' => 'required',
    ]);

    // Busca las identificaciones
    $tiposdocumentos = tiposdocumentos::findOrFail($id);

    // Actualiza solo los campos permitidos
    $tiposdocumentos->update($request->only( 'denominacion', 'observaciones'));

    // Redirige a la lista con mensaje de éxito
    return redirect()->route('tipodocumentos.index')->with('success', 'Identificacion actualizada correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el programa por su primary key (NIS)
    $tiposdocumentos = tiposdocumentos::findOrFail($id);

    // Eliminar el registro
    $tiposdocumentos->delete();

    // Redirigir a la lista con mensaje de éxito
    return redirect()->route('tipodocumentos.index')->with('success', 'Identificacion eliminada correctamente.');
    
    }
}
