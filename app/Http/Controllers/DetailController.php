<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use App\Models\pesanan;
use App\Models\detailpesanan;
use Auth;
use DB;
use Carbon\Carbon;
use Alert;
use Illuminate\Http\Request;

class DetailController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  } 
  
  public function index($id)
  {
    $title = "Detail Produk";
    $produk = produk::where('id', $id)->first();
    return view('detail.index', compact('produk', 'title'));
  }
   
  public function detail(Request $request, $id)
  {

    $produk = produk::where('id', $id)->first();
    $tanggal = Carbon::now();
        // validasi stok
    if ($request->jumlah_pesan > $produk->stok || $request->jumlah_pesan < 0) 
    {
      alert()->error('Pesanan Melebihi Stok Produk! Jumlah pesanan tidak boleh minus!', 'Gagal');
      return redirect('detail/'. $id); 
    }
         // cek pesanan
    $cek_pesanan =  pesanan::where('user_id',auth::user()->id)->where('status',0)->first();        
        // Pengecekan apakah pesanan sudah ada, jika sudah maka tinggal update pesanan yang lama, jika belum maka buat pesanan baru.
    if(empty($cek_pesanan))
    {
          // PESANAN BARU
      $pesanan = new pesanan;
      $pesanan->user_id = Auth::user()->id;
      $pesanan->tanggal = $tanggal;
      $pesanan->status = 0;
      $pesanan->total_harga = 0;
      $pesanan-> save();
    }
    
        // simpan kedalam database detailpesanan
    $pesanan = pesanan::where('user_id',auth::user()->id)->where('status',0)->first();  
        // cek detail pesanan
    $cek_detailpesanan = detailpesanan::where('produk_id', $produk->id)->where('pesanan_id',$pesanan->id)->first();
    if (empty($cek_detailpesanan)) 
    {
          // JIKA PRODUK Didalam pesanan belum ada, maka data detail yang baru akan dibuat.
      $detailpesanan = new detailpesanan;
      $detailpesanan->produk_id = $produk->id;
      $detailpesanan->pesanan_id = $pesanan->id;
      $detailpesanan->jumlah = $request->jumlah_pesan;
      $detailpesanan->harga_produk = $produk->harga;
      $detailpesanan-> save();
    }else{
          // JIKA PRODUK Sudah ada, maka jumlah produk yang dipesan akan ditambah, diupdate.
      $detailpesanan = detailpesanan::where('produk_id', $produk->id)->where('pesanan_id',$pesanan->id)->first();
          // Jumlah baru
      $detailpesanan->jumlah += $request->jumlah_pesan;        
          // harga baru
      $harga_detailpesanan_baru = $produk->harga*$request->jumlah_pesan;
      $detailpesanan->harga_produk += $harga_detailpesanan_baru;
          // Save update data
      $detailpesanan-> update();
    }
        // Update pesanan, total harga diubah.
    $pesanan = pesanan::where('user_id',auth::user()->id)->where('status',0)->first(); 
    $pesanan->total_harga += $produk->harga*$request->jumlah_pesan;
    $pesanan-> update();
    alert()->success('Pesanan Masuk Keranjang', 'Sukses');
    return redirect('home');
  }

  public function check_out()
  {
    $title = "Keranjang Belanja";
    $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    if($pesanan != null){
      $jum_item_pesanan = detailpesanan::where('pesanan_id', $pesanan->id)->count();
      $detailpesanans = DB::table('detailpesanans')
      ->join('produks', 'detailpesanans.produk_id','=', 'produks.id')
      ->select('detailpesanans.*', 'produks.nama_produk', 'produks.harga')
      ->where('pesanan_id', $pesanan->id)->get();
      
      return view('detail.check_out',compact('pesanan','detailpesanans', 'jum_item_pesanan', 'title'));
    }else{
      alert()->warning('Keranjang Belanja Kosong!', 'Kosong');
      return redirect('home');      
    }
  }     

  public function delete($id)
  {
    $detailpesanan = detailpesanan::where('id', $id)->first();
    $pesanan = pesanan::where('id', $detailpesanan->pesanan_id)->first();
    $pesanan->total_harga = $pesanan->total_harga-($detailpesanan->harga_produk * $detailpesanan->jumlah);
    $pesanan->update();
    $detailpesanan->delete();
    if ($pesanan->total_harga <= 0) {
      $pesanan->delete();
    }
    alert()->error('Produk Telah Di Hapus. Pesanan Dibatalkan', 'Hapus');
    return redirect('check-out');

  }
  public function konfirmasi(){
    if (auth::user()->alamat == null && auth::user()->nohp == null) {
      alert()->error('Checkout gagal! Lengkapi data diri!', 'Gagal');
      return redirect('check-out');      
    }
    $user = User::where('id', Auth::user()->id)->first();    
    $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();    
    $pesanan_id = $pesanan->id;
    $pesanan->status = 1;
    $pesanan->update();
    $detailpesanan = detailpesanan::where('pesanan_id', $pesanan_id)->get();
    foreach ($detailpesanan as $detailpesanan) 
    {
      $produk = produk::where('id', $detailpesanan->produk_id)->first();
      $produk->stok = $produk->stok-$detailpesanan->jumlah;
      $produk->update();
    }
    $detailpesanan = DB::table('detailpesanans')
      ->join('produks', 'detailpesanans.produk_id','=', 'produks.id')
      ->select('detailpesanans.*', 'produks.nama_produk', 'produks.harga')
      ->where('pesanan_id', $pesanan_id)->get();
    $jum_item_pesanan = count(pesanan::where('user_id', Auth::user()->id)->where('status',0)->get()); 
    $title = "Checkout Pesanan";       
    alert()->success('Pesanan Telah Berhasil di Check Out', 'Sukses');
    return view('detail.check_out_detail', compact('detailpesanan','pesanan','jum_item_pesanan','user', 'title'));        
  }
}
