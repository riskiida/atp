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
   		 <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
  		</ol>
		</nav>
      
    </div>
    <div class="col-md-12">
     <h3><i class="fa fa-shopping-cart"> </i> Keranjang </h3> 
     @if(!empty($pesanan))
        </div>
        <div class="card-body">
            <table class="table table-striped">
             <thead>
                 <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>  
                    <th>Sub-total</th>  
                 </tr>
             </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach($detailpesanans as $detailpesanan)
                 <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$detailpesanan->nama_produk}}</td>
                    <td>{{$detailpesanan->jumlah }} Kg</td>
                    <td>Rp. {{number_format($detailpesanan->harga)}}</td>
                    <td>Rp. {{number_format($detailpesanan->harga * $detailpesanan->jumlah)}}</td>
                    <td></td>
                    <td>
                        <form action="{{ url('check-out') }}/{{$detailpesanan->id}}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus pesanan ?');"><i class="fa fa-trash"></i>
                                
                            </button>
                            
                        </form>
                    </td>
                 </tr>
                 @endforeach
                 <tr>
                    <td><strong>Total Harga </strong> </td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td>Rp. {{number_format($pesanan->total_harga)}}</td>
                    <td>
                    </td>
                    <td>
                         <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success">
                            <i class="fa fa-shopping-cart"></i> Check Out
                        </a>
                    </td>
                    
                 </tr>
                 </tbody>
             </thead>
             </table>   
             @endif 
        </div>
    </div>
    
            
       
        
    </div>
   </div>
 
@endsection
