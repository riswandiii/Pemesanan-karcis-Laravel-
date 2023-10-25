<?php

namespace App\Http\Controllers;

use App\Models\PesananDetail;
use App\Http\Requests\StorePesananDetailRequest;
use App\Http\Requests\UpdatePesananDetailRequest;
use App\Models\Pesanan;

class PesananDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //Untuk menampilkan view pesanan detail user
        $pesananDetails = PesananDetail::where('pesanan_id', $id)->where('status', 0)->get();
        return view('pesanan_detail.index', [
            'title' => 'Pesanan detail ' . auth()->user()->fullname,
            'pesananDetails' => $pesananDetails
        ]);
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
     * @param  \App\Http\Requests\StorePesananDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesananDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PesananDetail $pesananDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PesananDetail $pesananDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesananDetailRequest  $request
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesananDetailRequest $request, PesananDetail $pesananDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesananDetail $pesananDetail, $id)
    {
        //untuk proses hapus pesanan detail
        $pesananDetail = PesananDetail::where('id', $id)->where('status', 0)->first();
        $pesanan = Pesanan::where('user_id', auth()->user()->id)->where('status_pesanan', 0)->first();
        $updatePesanan = [
            'total' => $pesanan->total - $pesananDetail->total_harga
        ];
        Pesanan::where('id', $pesanan->id)->update($updatePesanan);

        PesananDetail::destroy('id', $pesananDetail->id);
        return redirect('/detail-pesanan/' . $pesanan->id)->with('success', 'Facility order data has been successfully deleted');
    }
}
