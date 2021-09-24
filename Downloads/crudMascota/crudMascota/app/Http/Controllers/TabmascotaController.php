<?php

namespace App\Http\Controllers;

use App\Models\Tabmascota;
use Illuminate\Http\Request;

/**
 * Class TabmascotaController
 * @package App\Http\Controllers
 */
class TabmascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabmascotas = Tabmascota::paginate();

        return view('tabmascota.index', compact('tabmascotas'))
            ->with('i', (request()->input('page', 1) - 1) * $tabmascotas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tabmascota = new Tabmascota();
        return view('tabmascota.create', compact('tabmascota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tabmascota::$rules);

        $tabmascota = Tabmascota::create($request->all());

        return redirect()->route('tabmascotas.index')
            ->with('success', 'Mascota created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabmascota = Tabmascota::find($id);

        return view('tabmascota.show', compact('tabmascota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabmascota = Tabmascota::find($id);

        return view('tabmascota.edit', compact('tabmascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tabmascota $tabmascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tabmascota $tabmascota)
    {
        request()->validate(Tabmascota::$rules);

        $tabmascota->update($request->all());

        return redirect()->route('tabmascotas.index')
            ->with('success', 'Tabmascota updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tabmascota = Tabmascota::find($id)->delete();

        return redirect()->route('tabmascotas.index')
            ->with('success', 'Tabmascota deleted successfully');
    }
}
