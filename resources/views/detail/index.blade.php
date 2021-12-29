@extends('layouts.app')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="container">
	<div>
		<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$produk->nama_produk}}</li>
          </ol>
      </nav>
  </div>
  <div class="row">

    <div class="col-md-12">
    	<div class="card">
    		<div class="card-header">
              Detail Produk {{$produk->nama_produk}}	
          </div>
          <div class="card-body">
              <div class="row">
                 <div class="col-md-6">
                    <img src="{{url('uploads')}}/{{$produk->gambar}}" class="rounded mx-auto d-block" alt="..." width="100%" alt="">
                </div>
                <div class="col-md-6">
                    <h3>{{$produk->nama_produk}}</h3>
                    <table class="table table-hover" width="100%">
                       <tbody>
                          <tr>
                             <td>Harga</td>
                             <td>:</td>
                             <td>Rp. {{number_format($produk->harga)}} /Kg</td>
                         </tr>
                         <tr>
                             <td>Stok</td>
                             <td>:</td>
                             <td>{{$produk->stok}} Kg</td>
                         </tr>
                         <tr>
                             <td>Keterangan</td>
                             <td>:</td>
                             <td>{{$produk->keterangan}}</td>
                         </tr>
                         @if(Auth::check())                         
                         <tr>
                            <td>Jumlah Pesan</td>
                            <td>:</td>
                            <td> 
                               <form method="post" action="{{url('detail') }}/{{$produk->id}}">
                                 @csrf
                                 <input type="number" name="jumlah_pesan" class="form-control" required="">

                                 <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart"></i>Masukan Keranjang

                                 </button>
                             </form>

                             <td>Kg</td>

                         </td>
                     </tr>
                     @endif



                 </tbody> 

             </table>             
         </div>


     </div>

 </div>
</div>


</div>
</div>
</div>
@endsection
