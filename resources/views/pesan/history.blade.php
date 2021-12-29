@extends('layouts.app')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"> Kembali</i></a>
        </div>        
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <!-- Holder breadcum -->
                <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
              </ol>
            </nav>
        </div> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    Anda dapat memeriksa status pemesanan anda di halaman ini. Segala progres pesanan anda kami sajikan disini.
                </div>
            </div>
        </div>
        <div class="col">
                <div class="card">
                    <div class="card-body">                        
                        <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                        <table class="table">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th>Opsi</th>
                            </tr>
                            @foreach($pesanan as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->tanggal}}</td>
                                <td>
                                    @if($p->status == 0)
                                        Belum check out.
                                    @elseif($p->status == 1)
                                        Sudah checkout, belum dibayar.
                                    @elseif($p->status == 2)
                                        Sudah dibayar, sedang dikirim.
                                    @else
                                        Selesai. Pesanan sudah diterima pembeli.
                                    @endif
                                </td>
                                <td>Rp. {{number_format($p->total_harga)}},-</td>
                                <td>
                                    <a href="{{ url('history') }}/{{ $p->id }}" class="btn btn-info btn-md m-0"><i class="fa fa-info"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>                        
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
