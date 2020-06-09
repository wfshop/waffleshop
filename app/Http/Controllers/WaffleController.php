<?php

namespace App\Http\Controllers;

use App\Waffle;
use Illuminate\Http\Request;

class WaffleController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->user()
            ->waffles()
            ->create($request->only('html', 'css', 'js'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Waffle  $waffle
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Waffle $waffle)
    {
        return view('bake.index', compact('waffle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Waffle  $waffle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waffle $waffle)
    {
        return tap($waffle)->update($request->only('html', 'css', 'js'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
