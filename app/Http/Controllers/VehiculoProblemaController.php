<?php

namespace App\Http\Controllers;

use App\Models\VehiculoProblema;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Problema;

/**
 * Class VehiculoProblemaController
 * @package App\Http\Controllers
 */
class VehiculoProblemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculoProblemas = VehiculoProblema::all();

        return view('taller.index', compact('vehiculoProblemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = Vehiculo::all();
        $problema = Problema::all();
        return view('taller.create', compact('vehiculo', 'problema'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(VehiculoProblema::$rules);

        $vehiculoProblema = VehiculoProblema::create($request->all());

        return redirect()->route('taller.index')
            ->with('success', 'VehiculoProblema created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(VehiculoProblema $vehiculoProblema)
    {

      return view('taller.show', compact('vehiculoProblema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VehiculoProblema $vehiculoProblema)
    {
        $vehiculo = Vehiculo::all();
        $problema = Problema::all();
        return view('taller.edit', compact('vehiculo', 'problema', 'vehiculoProblema'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  VehiculoProblema $vehiculoProblema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehiculoProblema $vehiculoProblema)
    {
        request()->validate(VehiculoProblema::$rules);

        $vehiculoProblema->update($request->all());

        return redirect()->route('taller.index')
            ->with('success', 'VehiculoProblema updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(VehiculoProblema $vehiculoProblema)
    {
        $vehiculoProblema->delete();
        return redirect()->route('taller.index')
            ->with('success', 'VehiculoProblema deleted successfully');
    }
    
}
