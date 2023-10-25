<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //untuk menampilkan view data fasilitas
        if($request->search){
            return view('dashboard.fasilitas.index', [
                'title' => 'Data fasilitas',
                'fasilitas' => Fasilitas::where('nama_fasilitas', 'Like', '%' . $request->search . '%')->latest()->paginate(30)
            ]);
        }else{
            return view('dashboard.fasilitas.index', [
                'title' => 'Data fasilitas',
                'fasilitas' => Fasilitas::latest()->paginate(30)
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //untuk menampilkan view create data fasilitas
        return view('dashboard.fasilitas.create', [
            'title' => 'Create fasilitas',
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
         //proses tambah data barang
         $validasiData = $request->validate([
             'image' => 'image|file|max:1024',
             'nama_fasilitas' => ['required'],
             'fasilitas' => ['required'],
             'harga' => ['required'],
             'stock' => ['required'],
             'keterangan' => ['required']
        ]);

       if($request->file('image')){
           $validasiData['image'] = $request->file('image')->store('post-image');
       }
       Fasilitas::create($validasiData);
       return redirect('/data-fasilitas')->with('success', 'Facility data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas, $id)
    {
        //untuk menampilkan detail fasilitas
        $fasilitas = Fasilitas::where('id', $id)->first();
        return view('dashboard.fasilitas.show', [
            'title' => 'Detail ' . $fasilitas->nama_fasilitas,
            'fasilitas' => $fasilitas 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas, $id)
    {
        //untuk menampilkan view edit fasilitas
        $fasilitas = Fasilitas::where('id', $id)->first();
        return view('dashboard.fasilitas.edit', [
            'title' => 'Edit ' . $fasilitas->nama_fasilitas,
            'fasilitas' => $fasilitas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilitas, $id)
    {
        //untuk proses update fasilitas
        $fasilitas = Fasilitas::where('id', $id)->first();
        $rules = [
             'image' => 'image|file|max:1024',
             'nama_fasilitas' => ['required'],
             'fasilitas' => ['required'],
             'harga' => ['required'],
             'stock' => ['required'],
             'keterangan' => ['required']
        ];

        $validasiData = $request->validate($rules);
        if($request->file('image')){
            if($request->gambarLama){
                Storage::delete($request->gambarLama);
            }
            $validasiData['image'] = $request->file('image')->store('post-image');
        }
        Fasilitas::where('id', $fasilitas->id)->update($validasiData);
        return redirect('/data-fasilitas')->with('success', 'facility data changed successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas, $id)
    {
        //untuk proses hapus fasilitas
        $fasilitas = Fasilitas::where('id', $id)->first();
        if($fasilitas->image){
            Storage::delete($fasilitas->image);
        }
        Fasilitas::destroy('id', $fasilitas->id);
        return redirect('/data-fasilitas')->with('success', 'Facility data successfully deleted');
    }
}
