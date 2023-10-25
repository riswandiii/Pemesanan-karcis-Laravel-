<?php

namespace App\Http\Controllers;

use App\Models\Karcis;
use Illuminate\Http\Request;

class KarcisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
public function index()
{
    //untuk menampilkan view data karcis
    return view('dashboard.karcis.index', [
        'title' => 'Data karcis',
        'karcis' => Karcis::all()
    ]); 
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('dashboard.karcis.create', [
        'title' => 'Create karcis'
    ]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk proses tambah data karcis
        $validateData = $request->validate([
            'stock' => ['required'],
            'harga' => ['required']
        ]);
        Karcis::create($validateData);
        return redirect('/data-karcis')->with('success', 'Karcis data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karcis  $karcis
     * @return \Illuminate\Http\Response
     */
    public function show(Karcis $karcis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karcis  $karcis
     * @return \Illuminate\Http\Response
     */
    public function edit(Karcis $karcis, $id)
    {
        //untuk menampilkan view edit karcis
        $karcis = Karcis::where('id', $id)->first();
        return view('dashboard.karcis.edit', [
            'title' => 'Edit karcis',
            'karcis' => $karcis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karcis  $karcis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karcis $karcis, $id)
    {
        //untuk proses update karcis
        $karcis = Karcis::where('id', $id)->first();
        $validateData = $request->validate([
            'stock' => ['required'],
            'harga' => ['required']
        ]);
        Karcis::where('id', $karcis->id)->update($validateData);
        return redirect('/data-karcis')->with('success', 'Ticket data has been successfully changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karcis  $karcis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karcis $karcis, $id)
    {
        //untuk proses delete karcis
        $karcis = Karcis::where('id', $id)->first();
        Karcis::destroy('id', $karcis->id);
        return redirect('/data-karcis')->with('success', 'Ticket data deleted successfully');
    }
}
