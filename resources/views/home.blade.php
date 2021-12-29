@extends('layouts.app')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="container">
      <div class="row justify-content-end">
        <form class="form-inline" action="{{ url('home/cari') }}" method="get">
          <input class="form-control mr-sm-2" name="kata_kunci" type="search" placeholder="Search" aria-label="Search" >
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         
          <select class="form-control btn-success ml-2" name="urut_harga">
            <option selected>Harga</option>
            <option value="tertinggi">Tertinggi</option>
            <option value="terendah">Terendah</option>
          </select>
        </form>    
      </div>
      <div class="row justify-content-center">

        @foreach($produks as $produk)

        <div class="col-md-4 mb-6 mt-3">
          <div class="card">
            <img src="{{ url('uploads') }}/{{ $produk->gambar}}" class="card-img-top"  alt="..." style="width:100%; height:200px;">
            <div class="card-body">
              <h5 class="card-title">{{ $produk->nama_produk}}</h5>
              <p class="card-text">
                <strong>Harga :</strong> Rp. {{ number_format($produk->harga)}} /Kg <br>
                <strong>Stok :</strong>{{$produk->stok}} Kg <br>
                      
              </p>
              <hr>
              @if(Auth::check())
              <a href="{{url('detail')}}/{{ $produk->id}}" class="btn btn-primary float-right"><i class="fa fa-shopping-cart"></i>Beli</a>
              @else
              <a href="{{url('view')}}/{{ $produk->id}}" class="btn btn-primary float-right"><i class="fa fa-eye"></i> Detail</a>
              @endif
            </div>
          </div>
        </div>
        @endforeach          
      </div>
      <div class="row mt-2">
        <div class="col-md-12 justify-content-center">
          <span class="float-right">{{ $produks->links() }} </span>
        </div>
      </div>
    </div>
    @endsection
