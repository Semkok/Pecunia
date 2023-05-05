<?php

namespace App\Http\Controllers;

use App\Models\Bic;
use App\Http\Requests\StoreBicRequest;
use App\Http\Requests\UpdateBicRequest;

class BicController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBicRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bic  $bic
     * @return \Illuminate\Http\Response
     */
    public function show(Bic $bic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bic  $bic
     * @return \Illuminate\Http\Response
     */
    public function edit(Bic $bic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBicRequest  $request
     * @param  \App\Models\Bic  $bic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBicRequest $request, Bic $bic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bic  $bic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bic $bic)
    {
        //
    }
}
