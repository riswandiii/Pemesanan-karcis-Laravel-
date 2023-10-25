<?php

namespace App\Http\Controllers;

use App\Models\PesananKarcis;
use App\Http\Requests\StorePesananKarcisRequest;
use App\Http\Requests\UpdatePesananKarcisRequest;

class PesananKarcisController extends Controller
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
     * @param  \App\Http\Requests\StorePesananKarcisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesananKarcisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesananKarcis  $pesananKarcis
     * @return \Illuminate\Http\Response
     */
    public function show(PesananKarcis $pesananKarcis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesananKarcis  $pesananKarcis
     * @return \Illuminate\Http\Response
     */
    public function edit(PesananKarcis $pesananKarcis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesananKarcisRequest  $request
     * @param  \App\Models\PesananKarcis  $pesananKarcis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesananKarcisRequest $request, PesananKarcis $pesananKarcis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesananKarcis  $pesananKarcis
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesananKarcis $pesananKarcis)
    {
        //
    }
}
