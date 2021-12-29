<?php

namespace App\Http\Controllers;
use DB;
use App\Models\produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {            
        $title = "Home";
        $produks = produk::paginate(9);
        return view('home', compact('produks', 'title'));
    }

    public function viewProduct($id)
    {
        $title = "Detail Produk";
        $produk = produk::where('id', $id)->first();
        return view('detail.index', compact('produk', 'title'));
    }

    public function cari(Request $request)
    {
        $title = "Home - Cari";
        $keyword = $request->kata_kunci;
        // mengambil data dari table produks sesuai pencarian data
        $produks = DB::table('produks')
        ->where('nama_produk','like',"%".$keyword."%")
        ->paginate(9);

        if ($request->urut_harga != null) {
            if ($request->urut_harga == 'tertinggi') {
                $produks = DB::table('produks')
                ->where('nama_produk','like',"%".$keyword."%")
                ->orderBy('harga','desc')
                ->paginate(9);
            }else{
                $produks = DB::table('produks')
                ->where('nama_produk','like',"%".$keyword."%")
                ->orderBy('harga','asc')
                ->paginate(9);
            }
        }
 
        // mengirim data pegawai ke view home
        return view('home', compact('produks', 'title'));
    }

}
