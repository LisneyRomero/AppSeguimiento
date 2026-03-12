<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aprendices;
use App\Models\tiposdocumentos;
use App\Models\eps;
use Illuminate\Support\Facades\DB;

class aprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    
         public function index(Request $request)
    {
    
        $buscar = $request->buscar;

        $aprendices = aprendices::with(['tiposdocumentos', 'eps'])
            ->when($buscar, function ($query, $buscar) {
                $query->where('numDocumento', 'like', "%$buscar%")
                    ->orWhere('nombres', 'like', "%$buscar%")
                    ->orWhere('apellidos', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('aprendices.index', compact('aprendices', 'buscar'));
    


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();

        return view('aprendices.create', compact('tiposdocumentos', 'eps'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $request->validate([
            'tbl_tiposdocumentos_NIS' => 'required|exists:tbl_tiposdocumentos,NIS',
            'numDocumento' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'correoInstitucional' => 'required',
            'correoPersonal' => 'required',
            'sexo' => 'required',
            'fechaNacimiento' => 'required',
            'tbl_eps_NIS' => 'required|exists:tbl_eps,NIS'
        ],
            [
                'tbl_tiposdocumentos_NIS.required' => 'El campo Tipo de documento es obligatorio',
                'numDocumento.required' => 'El campo Numero de documento es obligatorio',
                'nombres.required' => 'El campo Nombres es obligatorio',
                'apellidos.required' => 'El campo Apellidos es obligatorio',
                'direccion.required' => 'El campo Direccion es obligatorio',
                'correoInstitucional.required' => 'El campo Correo institucional es obligatorio',
                'correoPersonal.required' => 'El campo Correo Personal es obligatorio',
                'sexo.required' => 'El campo Sexo es obligatorio',
                'fechaNacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio',
                'tbl_eps_NIS.required' => 'El campo Eps es obligatorio'
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        aprendices::create($request->all());

        return redirect()->route('aprendices.create')->with('success','Aprendiz registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aprendices = aprendices::findOrFail($id);

    return view('aprendices.show', compact('aprendices'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aprendices = aprendices::findOrFail($id);
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();
        return view('aprendices.edit', compact('aprendices', 'tiposdocumentos', 'eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'tbl_tiposdocumentos_NIS' => 'required',
            'numDocumento' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'correoInstitucional' => 'required',
            'correoPersonal' => 'required',
            'sexo' => 'required',
            'fechaNacimiento' => 'required',
            'tbl_eps_NIS' => 'required'
        ]);

        $aprendices = aprendices::findOrFail($id);

        $aprendices->tbl_tiposdocumentos_NIS = $request->tbl_tiposdocumentos_NIS;
        $aprendices->numDocumento = $request->numDocumento;
        $aprendices->nombres = $request->nombres;
        $aprendices->apellidos = $request->apellidos;
        $aprendices->direccion = $request->direccion;
        $aprendices->correoInstitucional = $request->correoInstitucional;
        $aprendices->correoPersonal = $request->correoPersonal;
        $aprendices->sexo = $request->sexo;
        $aprendices->fechaNacimiento = $request->fechaNacimiento;
        $aprendices->tbl_eps_NIS = $request->tbl_eps_NIS;
        $aprendices->save();

      return redirect()->route('aprendices.index')
       ->with('success','Aprendiz actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id  )
    {
        aprendices::destroy($id);

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz eliminado correctamente');
    }
}
