<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use Illuminate\Http\Request;

/**
 * Class ProblemaController
 * @package App\Http\Controllers
 */
class ProblemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemas = Problema::all();;

        return view('problema.index', compact('problemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('problema.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Problema::$rules);

        $problema = Problema::create($request->all());

        return redirect()->route('problemas.index')
            ->with('success', 'Problema created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Problema $problema)
    {
        return view('problema.show', compact('problema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Problema $problema)
    {
        return view('problema.edit', compact('problema'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Problema $problema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problema $problema)
    {
        request()->validate(Problema::$rules);

        $problema->update($request->all());

        return redirect()->route('problemas.index')
            ->with('success', 'Problema updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Problema $problema)
    {
        $problema->delete();
        return redirect()->route('problemas.index')
            ->with('success', 'Problema deleted successfully');
    }
}
