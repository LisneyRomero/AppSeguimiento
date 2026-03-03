<?php

namespace App\Http\Controllers;

use App\Models\roladministrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class roladministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $buscar = $request->buscar;

    $rol = DB::table('tbl_roladministrativo')
        ->when($buscar, function ($query, $buscar) {
            return $query->where('descripcion', 'like', "%$buscar%")
                            ->Orwhere('NIS', 'like', "%$buscar%");
                         
        })
        ->get();

    return view('rolesadministrativos.index', compact('rol'));
   
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('rolesadministrativos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required'
        ]);

        $rol = new roladministrativo();
        $rol ->descripcion = $request->descripcion;

        $rol->save();

        return redirect()-> route('rolesadministrativos.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Buscar por NIS
        $rol = roladministrativo::findOrFail($id);

        return view('rolesadministrativos.show',compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //rol por primary key
        $rol = roladministrativo::findOrFail($id);

        //retorna la vista edit con datos 
        return view('rolesadministrativos.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validacion de campos
        $request->validate([
            'descripcion' => 'required'
         ]);
         //Buscar rol
        $rol= roladministrativo::findOrFail($id);

        //Actualiza solo los campos permitidos
        $rol->update($request->only('descripcion'));

        //Redirige a la lista con mensaje de texto
        return redirect()->route ('rolesadministrativos.index')->with('success', 'rol actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Buscar la rol por su primary key
        $rol = roladministrativo::findOrFail($id);

        //eliminar un registro
        $rol->delete();

        //Redirigir a la lista con mensaje de texto
         return redirect()->route ('rolesadministrativos.index')->with('success', 'Rol eliminado correctamente');

    }
}
