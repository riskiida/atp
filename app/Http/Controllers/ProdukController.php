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

class ProdukController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
    }

	public function index()
	{
		$title = 'Daftar Produk';
		$produk = produk::all();    	
		return view('admin.produk.index',compact('produk', 'title'));          
	}

	public function create(Request $req)
	{
		// menyimpan data file yang diupload ke variabel $file
		$title = 'Tambah Produk';		
		if ($req->nama_produk == null) {
			return view('admin.produk.create', compact('title'));          			
		}else{
			$this->validate($req, [
				'nama_produk' => 'required',
				'harga' => 'required',
				'stok' => 'required',
				'file' => 'required',
				'keterangan' => 'required',
				]);
			
			$file = $req->file('file');
			$tujuan_upload = 'uploads';
			$file->move($tujuan_upload,$file->getClientOriginalName());
			$produk = new produk;
			$produk->nama_produk = $req->nama_produk;
			$produk->harga = $req->harga;
			$produk->stok = $req->stok;
			$produk->gambar = $file->getClientOriginalName();
			$produk->keterangan = $req->keterangan;
			$produk-> save();
			alert()->success('Produk telah ditambahkan!', 'Sukses');
			return redirect('produk');
		}
	}

	public function update(Request $req, $id)
	{
		$title = 'Update Produk';
		$produk = produk::where('id', $id)->first();
		if ($req->is_update == null) {
			return view('admin.produk.update', compact('produk', 'title'));          			
		}else{
			// dd($req);
			$file = $req->file('file');
			if ($file != null) {			
				unlink('uploads/'.$produk->gambar);
				$tujuan_upload = 'uploads';
				$file->move($tujuan_upload,$file->getClientOriginalName());
				$produk->gambar = $file->getClientOriginalName();
			}
			
			$produk->nama_produk = $req->nama_produk;
			$produk->harga = $req->harga;
			$produk->stok = $req->stok;
			$produk->keterangan = $req->keterangan;
			$produk-> update();
			alert()->success('Produk telah diupdate!', 'Sukses');
			return redirect('produk');
		}
	}

	public function delete($id)
	{
		$produk = produk::where('id', $id)->first();	
		unlink('uploads/'.$produk->gambar);	
		$produk->delete(); 
		alert()->error('Produk telah dihapus!', 'Hapus');
		return redirect('produk');
	}
}
