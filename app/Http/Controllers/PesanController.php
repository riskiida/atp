<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Alert;
use Carbon\Carbon;
use App\Models\produk;
use App\Models\pesanan;
use Illuminate\Http\Request;
use App\Models\detailpesanan;
use App\Models\User;

class PesanController extends Controller
{

    public function __construct()
    {
    	$this->middleware('auth');
    }

    // Fungsi history. Menampilkan pesanan yang sudah oke, guna ditindaklanjut yaitu dibayar.
    public function riwayat()
    {        
        $title = "Riwayat Pemesanan";
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status','!=',0)->get();
        $pesanan_unpaid = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->get();
        // dd($pesanan);
        if ($pesanan != null) {         
            $jum_item_pesanan = count($pesanan_unpaid);
        }
        return view('pesan.history', compact('pesanan','jum_item_pesanan', 'title'));
    }

    public function detail_riwayat($id)
    {
        $title = "Detail Riwayat Pemesanan";
        $jum_item_pesanan = count(pesanan::where('user_id', Auth::user()->id)->where('status',0)->get());        
        $pesanan_detail = DB::table('detailpesanans')
        ->join('produks', 'detailpesanans.produk_id','=', 'produks.id')
        ->select('detailpesanans.*', 'produks.nama_produk', 'produks.harga')
        ->where('pesanan_id', $id)->get();
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('id',$id)->first();
        return view('pesan.history_detail', compact('pesanan','pesanan_detail','jum_item_pesanan', 'title'));        
    }

    public function index()
    {
        $title = 'Daftar Pesanan';
        $orders = DB::table('pesanans')
        ->join('users', 'pesanans.user_id','=', 'users.id')
        ->select('pesanans.*', 'users.name')->get();
        return view('admin.pesanan.index',compact('orders', 'title'));     
    }

    public function update(Request $req, $id)
    {
        $title = 'Update Pesanan';
        $pesanan = DB::table('pesanans')
        ->join('users', 'pesanans.user_id','=', 'users.id')
        ->select('pesanans.*', 'users.name')
        ->where('pesanans.id', $id)->first();
        $pembeli = User::where('id', $pesanan->user_id)->first();
        if ($req->is_update == null) {
             $pesanan_detail = DB::table('detailpesanans')
            ->join('produks', 'detailpesanans.produk_id','=', 'produks.id')
            ->select('detailpesanans.*', 'produks.nama_produk', 'produks.harga')
            ->where('pesanan_id', $id)->get();
            return view('admin.pesanan.update', compact('pesanan', 'pesanan_detail', 'pembeli', 'title'));                      
        }else{
            $thispesanan = Pesanan::where('id', $id)->first();
            $thispesanan->status = $req->status;
            $thispesanan-> update();
            alert()->success('Status pesanan telah diupdate!', 'Sukses');
            return redirect('pesanan');
        }
    }
}
