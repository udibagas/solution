<?php

namespace App\Http\Controllers;

use App\Http\Requests\MesinRequest;
use App\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Mesin::all();
        return view('mesin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mesin.create', [
            'mesin' => new Mesin()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MesinRequest $request)
    {
        Mesin::create($request->all());
        return redirect('/mesin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function show(Mesin $mesin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesin $mesin)
    {
        return view('mesin.edit', compact('mesin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function update(MesinRequest $request, Mesin $mesin)
    {
        $mesin->update($request->all());
        return redirect('/mesin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesin $mesin)
    {
        $mesin->delete();
        return redirect('/mesin');
    }
}
