<?php

namespace App\Http\Controllers;

use App\Models\bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['bodegas']=bodega::paginate(2);
        return view('bodega.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bodega.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'nombre_producto'=>'required|string|max:100',
            'codigo_producto'=>'required|string|max:10',
            'cantidad'=>'required|numeric|integer',
            'precio'=>'required|numeric|integer',
            'edad'=>'required|numeric|integer'
        ];

        $mensajes=[
            'required'=>'El :attribute es requerido '
        ];

        $this->validate($request,$campos,$mensajes);

        $datosBodega = request()->except('_token');
        Bodega::insert($datosBodega);

        return redirect('bodega')->with('mensaje','Bodega Adicionada Existosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function show(bodega $bodega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bodega=bodega::findOrFail($id);
        return view('bodega.edit',compact('bodega'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombre_producto'=>'required|string|max:100',
            'codigo_producto'=>'required|string|max:10',
            'cantidad'=>'required|numeric|integer',
            'precio'=>'required|numeric|integer',
            'edad'=>'required|numeric|integer'
        ];

        $mensajes=[
            'required'=>'El :attribute es requerido '
        ];

        $this->validate($request,$campos,$mensajes);

        $datosBodega = request()->except(['_token','_method']);

        bodega::where('id','=',$id)->update($datosBodega);

        $bodega=bodega::findOrFail($id);
        return view('bodega.edit',compact('bodega'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Bodega::destroy($id);   
        return redirect('bodega')->with('mensaje','Bodega Eliminada con Existo');
    }
}
