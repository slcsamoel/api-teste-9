<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLauncheRequest;
use App\Http\Requests\UpdateLauncheRequest;
use App\Models\Launche;

class LauncheController extends Controller
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
     * @param  \App\Http\Requests\StoreLauncheRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLauncheRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Launche  $launche
     * @return \Illuminate\Http\Response
     */
    public function show(Launche $launche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLauncheRequest  $request
     * @param  \App\Models\Launche  $launche
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLauncheRequest $request, Launche $launche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Launche  $launche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Launche $launche)
    {
        //
    }
}
