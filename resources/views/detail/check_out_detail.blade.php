@extends('layouts.app')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> 
        </div>        
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                <li class="breadcrumb-item active" aria-current="page">Success Checkout</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12">            
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa fa-check"></i> Check Out Berhasil</h4>
                </div>
                <div class="card-body">
                    <strong><i class="fa fa-map-marker-alt" aria-hidden="true"></i> Alamat Pengiriman</strong> <span> {{$user->alamat}} </span>||
                    <strong><i class="fa fa-calendar-alt"></i> Tanggal Pesanan</strong> <span class="">'{{$pesanan->tanggal}}' </span>||
                    <strong><i class="fa fa-user-alt"></i> Pembeli</strong> <span> {{$user->name}} </span>||
                    <strong><i class="fa fa-check"></i> Status</strong> <span> 
                        @if($pesanan->status == 0)
                            Belum Check-out
                        @elseif($pesanan->status == 1)
                            Sudah Check-out, belum dibayar.
                        @elseif($pesanan->status == 2)
                            Sudah dibayar, sedang dikirim.
                        @else
                            Pesanan Selesai.
                        @endif
                    </span>
                </div>
            </div>
        </div>                
        <div class="col-md-12">                
                <div class="card mt-2">
                    <div class="card-body">                        
                        <h4><i class="fa fa-shopping-cart"></i> Item Pesanan</h4>
                        <span class="float-right">Tanggal : {{$pesanan->tanggal}}</span>
                        <table class="table table-hover">
                            <thead>
                                <th>No.</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Sub-Total</th>
                            </thead>
                            <tbody>
                                @foreach($detailpesanan as $pd)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$pd->nama_produk}}</td>
                                    <td>{{number_format($pd->jumlah)}} Kg</td>
                                    <td align="right">Rp. {{number_format($pd->harga)}},-</td>
                                    <td align="right">Rp. {{number_format($pd->harga_produk)}},-</td>                                
                                </tr>
                                @endforeach                                
                                <tr>                                
                                    <td align="right" colspan="4"><strong>Total Harga</strong></td>                            
                                    <td align="right"><strong>Rp. {{number_format($pesanan->total_harga)}},-</strong></td>
                                </tr>                        
                                <tr>
                                    <td colspan="4">
                                        Pesanan anda telah kami terima. Selanjutnya silakan transfer ke rekening <strong>BRI : 091234567890</strong> sejumlah <strong>Rp. {{ number_format($pesanan->total_harga + $pesanan->token) }},-</strong>
                                    </td>
                                    <td align="right">
                                        <a href="{{url('history')}}" class="btn btn-primary btn-md" >
                                            <i class="fa fa-info"></i> Info
                                        </a>
                                    </td>
                                </tr>
                            </tbody>                            
                        </table>                 
                    </div>
                </div>
                
        </div>
    </div>
</div>
@endsection
