<?php

namespace App\Http\Controllers;

use App\Models\Instant;
use App\Http\Requests\StoreInstantRequest;
use App\Http\Requests\UpdateInstantRequest;

class InstantController extends Controller
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
     * @param  \App\Http\Requests\StoreInstantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instant  $instant
     * @return \Illuminate\Http\Response
     */
    public function show(Instant $instant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instant  $instant
     * @return \Illuminate\Http\Response
     */
    public function edit(Instant $instant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstantRequest  $request
     * @param  \App\Models\Instant  $instant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstantRequest $request, Instant $instant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instant  $instant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instant $instant)
    {
        //
    }
}
