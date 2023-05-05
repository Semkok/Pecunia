<?php

namespace App\Http\Controllers;

use App\Models\Moneys;
use App\Http\Requests\StoreMoneysRequest;
use App\Http\Requests\UpdateMoneysRequest;

class MoneysController extends Controller
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
     * @param  \App\Http\Requests\StoreMoneysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMoneysRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moneys  $moneys
     * @return \Illuminate\Http\Response
     */
    public function show(Moneys $moneys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moneys  $moneys
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneys $moneys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMoneysRequest  $request
     * @param  \App\Models\Moneys  $moneys
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMoneysRequest $request, Moneys $moneys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moneys  $moneys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneys $moneys)
    {
        //
    }
}
