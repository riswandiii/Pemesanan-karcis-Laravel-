<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PesananController extends Controller
{

    //uFunction untuk menampilkan view data pesanan
    public function index(Request $request)
    {

        if($request->search){
            return view('dashboard.pesanan_fasilitas.index', [
                'title' => 'Data pesanan fasilitas',
                'pesanans' => PesananDetail::where('tanggal', 'LIKE', '%' . $request->search . '%')->latest()->paginate(20)
            ]);
        }else{
            return view('dashboard.pesanan_fasilitas.index', [
                'title' => 'Data pesanan fasilitas',
                'pesanans' => PesananDetail::all()
            ]);
        }
    
    }

    // Function untuk menampikakan detail data pesanan
    public function detailPesanan($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $user = User::where('id', $pesanan->user_id)->first();

        $pesananDetails = PesananDetail::where('pesanan_id', $id)->get();
        return view('dashboard.pesanan_fasilitas.detail_pesanan', [
            'title' => 'Detail pesanan ' . $user->fullname,
            'pesananDetails' => $pesananDetails
        ]);
    }

}
