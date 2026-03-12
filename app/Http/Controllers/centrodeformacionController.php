<?php

namespace App\Http\Controllers;
use App\Models\centrosdeformacion;
use App\Models\regionales;
use Illuminate\Http\Request;

class centrodeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
    
        $buscar = $request->buscar;

        $centrodeformacion = centrosdeformacion::with(['regionales'])
            ->when($buscar, function ($query, $buscar) {
                $query->where('codigo', 'like', "%$buscar%")
                    ->orWhere('denominacion', 'like', "%$buscar%")
                    ->orWhere('direccion', 'like', "%$buscar%");
                        
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('centrodeformacion.index', compact('centrodeformacion', 'buscar'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = regionales::all();

    return view('centrodeformacion.create', compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tbl_regionales_NIS' => 'required|exists:tbl_regionales,NIS',
            'codigo' => 'required',
            'denominacion' => 'required',
            'direccion' => 'required',
            'observaciones' => 'nullable',
        
        ],
            [
                'tbl_regionales_NIS.required' => 'El campo Regional es obligatorio',
                'codigo.required' => 'El campo Codigo es obligatorio',
                'denominacion.required' => 'El campo Denominacion es obligatorio',
                'direccion.required' => 'El campo direccion es obligatorio',
                'observaciones.nullable' => 'El campo Observaciones es opcional',
                
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

         centrosdeformacion::create($request->all());

        return redirect()->route('centrosdeformacion.index')->with('success','Centro de formación registrado correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $centrodeformacion = centrosdeformacion::findOrFail($id);

    return view('centrodeformacion.show', compact('centrodeformacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $centrodeformacion = centrosdeformacion::findOrFail($id);
        $regionales = regionales::all();
        
        return view('centrodeformacion.edit', compact('centrodeformacion', 'regionales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'tbl_regionales_NIS' => 'required',
        'codigo' => 'required',
        'denominacion' => 'required',
        'direccion' => 'required',
        'observaciones' => 'nullable'
    ]);

    $centrodeformacion = centrosdeformacion::findOrFail($id);

    $centrodeformacion->update($request->all());

    return redirect()->route('centrosdeformacion.index')
        ->with('success','Centro de formación actualizado correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        centrosdeformacion::destroy($id);

        return redirect()->route('centrosdeformacion.index')->with('success', 'Centro de formación eliminado correctamente');
    }
}

