<?php

namespace App\Http\Controllers;

use App\Models\enteconformadores;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class enteconformadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $buscar = $request->buscar;

        $enteconformador = enteconformadores::with(['tiposdocumentos'])
    ->when($buscar, function ($query, $buscar) {
        $query->where('numDocumento', 'like', "%$buscar%")
              ->orWhere('razonSocial', 'like', "%$buscar%");
    })
    ->paginate(10)
    ->withQueryString();

        return view('EnteConformador.index', compact('enteconformador', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposdocumentos = tiposdocumentos::all();

        return view('EnteConformador.create', compact('tiposdocumentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tbl_tiposdocumentos_NIS' => 'required|exists:tbl_tiposdocumentos,NIS',
            'numDocumento' => 'required',
            'razonSocial' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correoInstitucional' => 'required',

        ],
            [
               'tbl_tiposdocumentos_NIS.required' => 'El campo tipo de documento es requerido',
               'numDocumento.required' => 'El campo documento debe ser requerido',
                'razonSocial.required' => 'El campo razon social  es requerido',
                'direccion.required' => 'El campo direccion  es requerido',
                'telefono.required' => 'El campo telefono  es requerido',
                'correoInstitucional.required' => 'El campo correo institucional es requerido',

            ]);

        enteconformadores::create($request->all());
        return redirect()->route('enteconformadores.index')
            ->with('success', 'Empresa creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enteconformador = enteconformadores::findOrFail($id);
        return view('EnteConformador.show', compact('enteconformador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enteconformador = enteconformadores::findOrFail($id);
        $tiposdocumentos = tiposdocumentos::all();

   return view('EnteConformador.edit', compact('enteconformador' , 'tiposdocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tbl_tiposdocumentos_NIS' => 'required|exists:tbl_tiposdocumentos,NIS',
            'numDocumento' => 'required',
            'razonSocial' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correoInstitucional' => 'required',
        ]);

        $enteconformador = enteconformadores::findOrFail($id);
        $enteconformador->update($request->all());

        return redirect()->route('enteconformadores.index')
            ->with('success', 'Empresa actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        enteconformadores::destroy($id);
        return redirect()->route('enteconformadores.index')->with('success', 'Empresa eliminada satisfactoriamente');
    }
}
