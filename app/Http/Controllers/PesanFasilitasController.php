<?php

namespace App\Http\Controllers;
use App\Models\Fasilitas;
use App\Models\Karcis;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\PesananKarcis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PesanFasilitasController extends Controller
{

    //Function untuk menampilkan view pemesanan fasilitas
    public function index(Fasilitas $fasilitas)
    {
        return view('pesan_fasilitas.index', [
            'title' => $fasilitas->nama_fasilitas,
            'fasilitas' => $fasilitas
        ]);
    }

    // Function utnuk proses pemesan fasilitas
    public function pesanFasilitas(Request $request, Fasilitas $fasilitas)
    {
        
        // Cek jumlah stock
        if($request->jumlah_pesan > $fasilitas->stock){
            return redirect('/pesan-fasilitas/' . $fasilitas->id)->with('success', 'Stock tidak tersedia!');
        }else{
            $updateStock = [
                'stock' => $fasilitas->stock - $request->jumlah_pesan
            ];
            Fasilitas::where('id', $fasilitas->id)->update($updateStock);
        }

        $tanggal = Carbon::now();
        $userKarcis = PesananKarcis::where('user_id', auth()->user()->id)->first();

        // Pesanan fasilitas
        $userPesananFasilitas = Pesanan::where('user_id', auth()->user()->id)->where('status_pesanan', 0)->first();
        if(empty($userPesananFasilitas)){
            $insert = [
                'user_id' => auth()->user()->id,
                'tanggal_pesanan' => date($tanggal),
                'total' => $userKarcis->total + $request->jumlah_pesan * $request->harga,
                'status_pesanan' => 0
            ];
            Pesanan::create($insert);
        }else{
            $update = [
                'tanggal_pesanan' => date($tanggal),
                'total' => $userKarcis->total + $userPesananFasilitas->total + $request->jumlah_pesan * $request->harga
            ];
            Pesanan::where('id', $userPesananFasilitas->id)->update($update);
        }

        // PesananFasilitasDetail
        $userPesananFasilitas = Pesanan::where('user_id', auth()->user()->id)->where('status_pesanan', 0)->first();
        $pesananDetail = PesananDetail::where('fasilitas_id', $fasilitas->id)->where('pesanan_id', $userPesananFasilitas->id)->where('status', 0)->first();
        $karcisPesanan = PesananKarcis::where('user_id', auth()->user()->id)->first();
        if(empty($pesananDetail)){
            $insert = [
                'pesanan_id' => $userPesananFasilitas->id,
                'jumlah_karcis' => $karcisPesanan->jumlah_pesan,
                'fasilitas_id' => $request->fasilitas_id,
                'jumlah_pesan' => $request->jumlah_pesan,
                'tanggal' => date($tanggal),
                'status' => 0,
                'total_harga' => $userKarcis->total + $request->jumlah_pesan *  $request->harga
            ];
            PesananDetail::create($insert);
        }else{
            $update = [
                'jumlah_pesan' => $pesananDetail->jumlah_pesan + $request->jumlah_pesan,
                'tanggal' => date($tanggal),
                'total_harga' =>  $userKarcis->total + $pesananDetail->total_harga + $request->jumlah_pesan * $request->harga
            ];
            PesananDetail::where('id', $pesananDetail->id)->update($update);
        }
        return redirect('/pesanan-fasilitas-user')->with('success', 'Facility has been successfully added to the order basket');
    }

    // Function untuk menampilkan view data pemesanan fasilitas user
    public function pesananFasilitas()
    {
        $pesananFasilitasUser = Pesanan::where('user_id', auth()->user()->id)->where('status_pesanan', '0')->first();
        if(empty($pesananFasilitasUser)){
            return view('pesan_fasilitas.pesanan_fasilitas', [
                'title' => 'Pesanan fasilitas ' . auth()->user()->fullname,
        ]);
        }else{
            return view('pesan_fasilitas.pesanan_fasilitas', [
                'title' => 'Pesanan fasilitas ' . auth()->user()->fullname,
                'pesanan' => $pesananFasilitasUser
        ]);
        }
    }

}
