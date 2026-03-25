<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fichacaracterizacion;
use App\Models\programasdeformacion;
use App\Models\centrosdeformacion;
use Illuminate\Support\Facades\DB;

class fichacaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $buscar = $request->buscar;

        $ficha = fichacaracterizacion::with(['programasdeformacion', 'centrosdeformacion'])
            ->when($buscar, function ($query, $buscar) {
                $query->where('codigo', 'like', "%$buscar%")
                    ->orWhere('denominacion', 'like', "%$buscar%");
            })
            
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('FichaCaracterizacion.index', compact('ficha', 'buscar'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programasdeformacion = programasdeformacion::all();
        $centrosdeformacion = centrosdeformacion::all();

        return view('FichaCaracterizacion.create', compact('programasdeformacion', 'centrosdeformacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'codigo' => 'required',        
        'tbl_programasdeformacion_NIS'=> 'required|exists:tbl_programasdeformacion,NIS',
        'denominacion' => 'required',
        'cupo' => 'required',
        'fechaInicio' => 'required',
        'fechaFin' => 'required',
        'tbl_centrosdeformacion_NIS' => 'required|exists:tbl_centrosdeformacion,NIS',
        'observaciones' => 'nullable',
        ],
        [
            'codigo.required' => 'El campo código es obligatorio.',
            'tbl_programasdeformacion_NIS.required' => 'El campo programa de formación es obligatorio.',
            'tbl_programasdeformacion_NIS.exists' => 'El programa de formación seleccionado no existe.',
            'denominacion.required' => 'El campo denominación es obligatorio.',
            'cupo.required' => 'El campo cupo es obligatorio.',
            'fechaInicio.required' => 'El campo fecha de inicio es obligatorio.',
            'fechaFin.required' => 'El campo fecha de fin es obligatorio.',
            'tbl_centrosdeformacion_NIS.required' => 'El campo centro de formación es obligatorio.',
            'tbl_centrosdeformacion_NIS.exists' => 'El centro de formación seleccionado no existe.',
        ]);
        


        fichacaracterizacion::create($request->all());

        return redirect()->route('fichacaracterizacion.index')
        ->with('success', 'Ficha de caracterización creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ficha = fichacaracterizacion::findOrFail($id);

        return view('FichaCaracterizacion.show', compact('ficha'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ficha = fichacaracterizacion::findOrFail($id);
        $programasdeformacion = programasdeformacion::all();
        $centrosdeformacion = centrosdeformacion::all();

        return view('FichaCaracterizacion.edit', compact('ficha', 'programasdeformacion', 'centrosdeformacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'codigo' => 'required',        
            'tbl_programasdeformacion_NIS'=> 'required|exists:tbl_programasdeformacion,NIS',
            'denominacion' => 'required',
            'cupo' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'tbl_centrosdeformacion_NIS' => 'required|exists:tbl_centrosdeformacion,NIS',
            'observaciones' => 'nullable',
        ],
        [
            'codigo.required' => 'El campo código es obligatorio.',
            'tbl_programasdeformacion_NIS.required' => 'El campo programa de formación es obligatorio.',
            'tbl_programasdeformacion_NIS.exists' => 'El programa de formación seleccionado no existe.',
            'denominacion.required' => 'El campo denominación es obligatorio.',
            'cupo.required' => 'El campo cupo es obligatorio.',
            'fechaInicio.required' => 'El campo fecha de inicio es obligatorio.',
            'fechaFin.required' => 'El campo fecha de fin es obligatorio.',
            'tbl_centrosdeformacion_NIS.required' => 'El campo centro de formación es obligatorio.',
            'tbl_centrosdeformacion_NIS.exists' => 'El centro de formación seleccionado no existe.',
         ]);

         return redirect()->route('fichacaracterizacion.index')
            ->with('success','Ficha de caracterización actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       fichacaracterizacion::destroy($id);

        return redirect()->route('fichacaracterizacion.index')
            ->with('success', 'Ficha de caracterización eliminada correctamente');
    }
}
