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
    public function index(Request $request)
{
    $buscar = $request->buscar;

    $programas = DB::table('tbl_programasdeformacion')
        ->when($buscar, function ($query, $buscar) {
            return $query->where('denominacion', 'like', "%$buscar%")
                         ->orWhere('codigo', 'like', "%$buscar%");
        })
        ->get();

    return view('programas.index', compact('programas'));
   
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

        $programas = new programasdeformacion();
        $programas->codigo = $request->codigo;
        $programas->denominacion = $request->denominacion;
        $programas->observaciones = $request->observaciones;

        $programas->save();


        return redirect()->route('programas.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Buscar el programa por su NIS
    $programas = programasdeformacion::findOrFail($id);

    return view('programas.show', compact('programas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busca el programa por su primary key (NIS)
    $programas = programasdeformacion::findOrFail($id);

    // Retorna la vista edit con los datos
    return view('programas.edit', compact('programas'));
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

    // Busca el programa
    $programas = programasdeformacion::findOrFail($id);

    // Actualiza solo los campos permitidos
    $programas->update($request->only('codigo', 'denominacion', 'observaciones'));

    // Redirige a la lista con mensaje de éxito
    return redirect()->route('programas.index')->with('success', 'Programa actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el programa por su primary key (NIS)
    $programas = programasdeformacion::findOrFail($id);

    // Eliminar el registro
    $programas->delete();

    // Redirigir a la lista con mensaje de éxito
    return redirect()->route('programas.index')->with('success', 'Programa eliminado correctamente.');
    }
}
