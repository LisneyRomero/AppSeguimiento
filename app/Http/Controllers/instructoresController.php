<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\instructores;
use App\Models\tiposdocumentos;
use App\Models\eps;
use App\Models\roladministrativo;
use Illuminate\Support\Facades\DB;

class instructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
        public function index(Request $request)
    {

        $buscar = $request->buscar;

        $instructores = instructores::with(['tiposdocumentos', 'eps', 'roladministrativo'])
            ->when($buscar, function ($query, $buscar) {
                $query->where('numDocumento', 'like', "%$buscar%")
                    ->orWhere('nombres', 'like', "%$buscar%")
                    ->orWhere('apellidos', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('Instructores.index', compact('instructores', 'buscar'));



    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roladministrativo = roladministrativo::all();
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();

        return view('Instructores.create', compact('roladministrativo' ,'tiposdocumentos',  'eps'));
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
            'tbl_eps_NIS' => 'required|exists:tbl_eps,NIS',
            'tbl_roladministrativo_NIS' => 'required|exists:tbl_roladministrativo,NIS'
        ],
        [
            'tbl_tiposdocumentos_NIS.required' => 'El campo tipo de documento es obligatorio.',
            'tbl_tiposdocumentos_NIS.exists' => 'El tipo de documento seleccionado no es válido.',
            'numDocumento.required' => 'El campo número de documento es obligatorio.',
            'nombres.required' => 'El campo nombres es obligatorio.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'correoInstitucional.required' => 'El campo correo institucional es obligatorio.',
            'correoPersonal.required' => 'El campo correo personal es obligatorio.',
            'sexo.required' => 'El campo sexo es obligatorio.',
            'fechaNacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
            'tbl_eps_NIS.required' => 'El campo EPS es obligatorio.',
            'tbl_eps_NIS.exists' => 'La EPS seleccionada no es válida.',
            'tbl_roladministrativo_NIS.required' => 'El campo rol administrativo es obligatorio.',
            'tbl_roladministrativo_NIS.exists' => 'El rol administrativo seleccionado no es válido.'
        ]
        
        );

        instructores::create($request->all());

        return redirect()->route('instructores.index')->with('success', 'Instructor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instructores = instructores::findOrFail($id);

        return view('Instructores.show', compact('instructores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instructores = instructores::findOrFail($id);
        $roladministrativo = roladministrativo::all();
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();

        return view('Instructores.edit', compact('instructores','roladministrativo','tiposdocumentos', 'eps' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'tbl_eps_NIS' => 'required|exists:tbl_eps,NIS',
            'tbl_roladministrativo_NIS' => 'required|exists:tbl_roladministrativo,NIS'
        ],
        [
            'tbl_tiposdocumentos_NIS.required' => 'El campo tipo de documento es obligatorio.',
            'tbl_tiposdocumentos_NIS.exists' => 'El tipo de documento seleccionado no es válido.',
            'numDocumento.required' => 'El campo número de documento es obligatorio.',
            'nombres.required' => 'El campo nombres es obligatorio.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'correoInstitucional.required' => 'El campo correo institucional es obligatorio.',
            'correoPersonal.required' => 'El campo correo personal es obligatorio.',
            'sexo.required' => 'El campo sexo es obligatorio.',
            'fechaNacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
            'tbl_eps_NIS.required' => 'El campo EPS es obligatorio.',
            'tbl_eps_NIS.exists' => 'La EPS seleccionada no es válida.',
            'tbl_roladministrativo_NIS.required' => 'El campo rol administrativo es obligatorio.',
            'tbl_roladministrativo_NIS.exists' => 'El rol administrativo seleccionado no es válido.'
        ]
        
        );

        $instructores = instructores::findOrFail($id);
        $instructores->update($request->all());

        return redirect()->route('instructores.index')->with('success', 'Instructor actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        instructores::destroy($id);

        return redirect()->route('instructores.index')->with('success', 'Instructor eliminado exitosamente.');      
    }
}
