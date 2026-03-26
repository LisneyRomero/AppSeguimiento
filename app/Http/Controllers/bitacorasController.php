<?php

namespace App\Http\Controllers;

use App\Models\bitacoras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class bitacorasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacoras = bitacoras::with('usuarios')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Bitacoras.index', compact('bitacoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Bitacoras.create');

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar archivo
        $request->validate([
            'archivo' => 'required|string|max:45',
            'bitacora' => 'required|file|mimes:pdf|max:10240'
        ]);

        // Guardar archivo en storage/app/public/Uploads/bitacoras
        $archivo = $request->file('bitacora');
        $nombre = time() . '_' . $archivo->getClientOriginalName();
        $ruta = $archivo->storeAs('Uploads/bitacoras', $nombre, 'public');

        // Guardar registro en BD
        bitacoras::create([
            'archivo' => $request->archivo,
            'ruta' => $ruta,
            'estado' => 'Creada',
            'tbl_usuarios_NIS' => Auth::user()->NIS
        ]);

        return redirect()->route('bitacoras.create')
            ->with('registrar', 'Bitácora subida correctamente');
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
        $bitacora = bitacoras::findOrFail($id);

        // Eliminar archivo del storage
        Storage::disk('public')->delete($bitacora->ruta);

        // Eliminar registro de la BD
        $bitacora->delete();

        return redirect()->route('bitacoras.index')
            ->with('success', 'Bitácora eliminada correctamente');
    }
}
