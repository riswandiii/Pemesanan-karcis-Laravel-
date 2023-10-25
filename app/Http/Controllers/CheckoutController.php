<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Models\Karcis;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetail;
use App\Models\PesananKarcis;
use Illuminate\Http\Request;
use PDF;

class CheckoutController extends Controller
{

    //Function untuk proses checkout
    public function checkout(Pesanan $pesanan)
    {

        $userKarcis = PesananKarcis::where('user_id', auth()->user()->id)->first();

        $pesananDetail = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        $pesananUpdate = [
            'status_pesanan' => '1'
        ];
        Pesanan::where('id', $pesanan->id)->update($pesananUpdate);

        $pesananDetailUpdate = [
            'status' => '1'
        ];
        PesananDetail::where('pesanan_id', $pesanan->id)->update($pesananDetailUpdate);

        // Hapus karcislama
        PesananKarcis::destroy('id', $userKarcis->id);
        return redirect('/history-pemesanan')->with('success', 'Sukses melakukan checkout, Siilahkan upload bukti pembayaran!');
    }

    // Function untuk menampilkan view history pemesanan user
    public function historyPemesanan()
    {
        $pesanan = Pesanan::where('user_id', auth()->user()->id)->where('status_pesanan', 1)->first();
        if(!empty($pesanan)){
            $bukti_tf = BuktiPembayaran::where('pesanan_id', $pesanan->id)->first();
            return view('history.index', [
                'title' => 'History pemesanan fasilitas ' . auth()->user()->fullname,
                'pesanan' => $pesanan,
                'bukti_tf' => $bukti_tf
            ]);
        }
        return view('history.index', [
            'title' => 'History pemesanan fasilitas ' . auth()->user()->fullname,
            'pesanan' => $pesanan
        ]);
        
    }

    // Function untuk menampilkan view detail history pesanan
    public function detailHistory($id)
    {
        $pesananDetails = PesananDetail::where('pesanan_id', $id)->where('status', 1)->get();
        return view('history.detail_history_pesanan', [
            'title' => 'History pesanan detail ' . auth()->user()->fullname,
            'pesananDetails' => $pesananDetails
        ]);
    }

    // Function proses upload bukti tf 
    public function upload(Request $request)
    {
         //proses tambah data barang
         $validasiData = $request->validate([
            'pesanan_id' => ['required'],
            'image' => 'image|file|max:1024'
       ]);

      if($request->file('image')){
          $validasiData['image'] = $request->file('image')->store('post-image');
      }
      BuktiPembayaran::create($validasiData);
      return redirect('/history-pemesanan')->with('success', 'Upload bukti pembayaran sukses!');
    }


    // Function untuk menampilkan view data user
    public function user()
    {
        return view('dashboard.custumers.index', [
            'title' => 'Data custumers',
            'users' => User::all()
        ]);
    }

    // Funtion untuk mencetak bukti pemesanaan
    public function cetakPesanan($id)
    {
         $cetak = Pesanan::where('id', $id)->first();
        // return view('history.cetak_pemesanan', [
        //     'cetak' => $cetak
        // ]);
        $update = [
            'status_pesanan' => 2
        ];
        Pesanan::where('id', $id)->update($update);
        view()->share('cetak', $cetak);
        $pdf = PDF::loadview('history.cetak_pemesanan');
        return $pdf->download('cetak.pdf');
    }

}

