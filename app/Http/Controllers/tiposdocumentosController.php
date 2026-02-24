<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Laravel\Prompts\select;

class tiposdocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposdocumentosContoller = DB :: table('tbl_tiposdocumentos')
            ->SELECT('tbl_tiposdocumentos.*')
            ->GET();
        dd($tiposdocumentosContoller);

        return view('TiposDocumentos.index', compact('tiposdocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
