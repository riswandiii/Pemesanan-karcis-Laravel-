<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Fasilitas;
use App\Models\Karcis;
use App\Models\PesananKarcis;
use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    
    //function untuk menampilkan view home
    public function index(Request $request)
    {
        if($request->search){
            return view('index', [
                'title' => 'Home',
                'karcis' => Karcis::all(),
                'fasilitas' => Fasilitas::where('nama_fasilitas', 'LIKE', '%' . $request->search . '%')->latest()->paginate(6)
            ]);
        }else{
            return view('index', [
                'title' => 'Home',
                'karcis' => Karcis::all(),
                'fasilitas' => Fasilitas::latest()->paginate(6)
            ]);
        }
    }

    // Function untuk menampilkan view gallery
    public function gallery()
    {
        return view('layouts.gallery', [
            'title' => 'Gallery'
        ]);
    }

    // Function untuk menampilkan view about
    public function about()
    {
        return view('layouts.about', [
            'title' => 'About'
        ]);
    }

    // Function untuk menampilkan view contact
    public function contact()
    {
        return view('layouts.contact', [
            'title' => 'Contact Us'
        ]);
    }


}
