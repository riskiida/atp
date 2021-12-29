<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Alert;
use App\Models\User;
use Carbon\Carbon;
use App\Models\produk;
use App\Models\pesanan;
use Illuminate\Http\Request;
use App\Models\detailpesanan;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Profile";
        $user = User::where('id', Auth::user()->id)->first();
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if ($pesanan != null) {         
            $jum_item_pesanan = detailpesanan::where('pesanan_id', $pesanan->id)->count();
        }else{
            $jum_item_pesanan = 0;        	
        }
        return view('profile.index', compact('jum_item_pesanan','user', 'title'));
    }

    public function profile_check(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($user->roles == 'admin') {
            return redirect('/dashboard');
        }else{
            return redirect('/home');
        }
    }

    public function edit_profile(Request $req)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if ($pesanan != null) {         
            $jum_item_pesanan = detailpesanan::where('pesanan_id', $pesanan->id)->count();
        }else{
            $jum_item_pesanan = 0;
        }

        if (Hash::check($req->oldpassword, $user->password)) {
            // The passwords match...
            $user->name = $req->name;
            $user->email = $req->email;
            $user->nohp = $req->nohp;
            $user->alamat = $req->alamat;
            if ($req->password != "") {
                if ($req->password == $req->password_confirmation) {
                    $user->password = Hash::make($req->password);
                }else{
                    alert()->error('Ketik Ulang Password Baru Dengan Benar', 'Error');        
                    return redirect('profile');
                }           
            }
            $user->update();
            alert()->success('Edit Profil Sukses', 'Success');        
        }else{            
            alert()->error('Password Lama Tidak Sesuai', 'Error');        
        }
        if ($req->iseditadmin != null) {
            return redirect('account/me');
        }else{
            return redirect('profile');
        }
    }

    // FUNGSI - FUNGSI MILIK ADMIN

    public function AdminDashboard()
    {
        $title = 'Dashboard';
        $produk     = count(produk::all());
        $pengguna   = count(User::where('roles', 'user')->get());    
        $pesanan    = count(pesanan::all());
        $admin      = count(User::where('roles', 'admin')->get());    
        return view('admin.dashboard', compact('produk', 'pengguna', 'pesanan', 'admin', 'title'));        
    }

    public function adminProfile()
    {
        $title = "Profile";
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.adminprofile', compact('user', 'title'));                             
    }

    public function showUsers()
    {
        $title = 'Daftar Akun Pengguna';
        $users = User::all();
        return view('admin.account.index', compact('users', 'title'));        
    }

    public function create(Request $req)
    {
        $title = 'Tambah Admin';
        if ($req->name == null) {
            return view('admin.account.create', compact('title'));                     
        }else{
            $this->validate($req, [
                'name' => 'required',
                'email' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'password' => 'required',
                ]);
            
            $user = new User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->nohp = $req->nohp;
            $user->alamat = $req->alamat;
            $user->password = $req->password;
            $user->roles = "admin";
            $user-> save();
            alert()->success('Akun admin baru telah ditambahkan!', 'Sukses');
            return redirect('account');
        }
    }

    public function update(Request $req, $id)
    {
        $title = 'Update Akun Pengguna';
        $user = User::where('id', $id)->first();
        if ($req->is_update == null) {
            return view('admin.account.update', compact('user', 'title'));                      
        }else{            
            $this->validate($req, [
                'name' => 'required',
                'email' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'password' => 'required',
                ]);
            $user->name = $req->name;
            $user->email = $req->email;
            $user->nohp = $req->nohp;
            $user->alamat = $req->alamat;
            $user->password = $req->password;
            $user-> update();
            alert()->success('Akun admin telah diupdate!', 'Sukses');
            return redirect('account');
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();    
        if ($user->gambar != 'def_user.png') {
             
        }
        $user->delete(); 
        alert()->error('Akun admin telah dihapus!', 'Hapus');
        return redirect('account');
    }
}
