<?php

namespace App\Http\Controllers;
use App\Models\Karcis;
use App\Models\PesananKarcis;
use Illuminate\Http\Request;

class PesanKarcisController extends Controller
{


    //Function untuk menampilkan view pesan karcis
    public function index(Karcis $karcis)
    {
        return view('pesan_karcis.index', [
            'title' => 'Pemesanan karcis salupajaan',
            'karcis' => $karcis
        ]);
    }

    // Function untuk proses pesan karcis
    public function pesanKarcis(Request $request)
    {
        // $total = $request->jumlah_pesan * $request->harga;
        // return $total;

        // Update stok karcis 
        $karcis = Karcis::where('id', $request->id)->first();
        if($request->jumlah_pesan > $karcis->stock){
            return redirect('/pesanan-karcis')->with('success', 'Stock karcis tidak tersedia!');
        }else{
            $updateKarcis = [
                'stock' => $karcis->stock - $request->jumlah_pesan
            ];
            Karcis::where('id', $karcis->id)->update($updateKarcis);
    
            $userPesananKarcis = PesananKarcis::where('user_id', auth()->user()->id)->first();
            if(empty($userPesananKarcis)){
                $insert = [
                    'user_id' => auth()->user()->id,
                    'jumlah_pesan' => $request->jumlah_pesan,
                    'total' => $request->jumlah_pesan * $request->harga 
                ];
                PesananKarcis::create($insert);
            }else{
               $update = [
                    'jumlah_pesan' => $userPesananKarcis->jumlah_pesan + $request->jumlah_pesan,
                    'total' => $userPesananKarcis->total + $request->jumlah_pesan * $request->harga
               ];
               PesananKarcis::where('id', $userPesananKarcis->id)->update($update);
            }
            return redirect('/pesanan-karcis')->with('success', 'Your ticket order has been successfully added!');
        }
    }

    // Function untuk menampilkan view pesanan karcis
    public function pesananKarcis()
    {
        $pesananKarcis = PesananKarcis::where('user_id', auth()->user()->id)->get();
        return view('pesan_karcis.pesanan_karcis', [
            'title' => 'Pesanan karcis ' . auth()->user()->fullname,
            'pesananKarcis' => $pesananKarcis
        ]);
    }

}
