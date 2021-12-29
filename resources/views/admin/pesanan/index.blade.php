@extends('layouts.adminapp')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="row">
	<div class="col">
		<span class="h3 text-gray-800">Pesanan</span>
	</div>
</div>
<div class="row mt-3">
	<div class="col">
		<!-- TABLE RESPONSIF SBADMIN -->
		<div class="card-body shadow mb-2">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">			
					<thead>
						<tr>
							<th>No.</th>
							<th>Pembeli</th>
							<th>Status</th>
							<th>Total Harga</th>
							<th>Tanggal Masuk</th>
							<th>Last Update</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No.</th>
							<th>Pembeli</th>
							<th>Status</th>
							<th>Total Harga</th>
							<th>Tanggal Masuk</th>
							<th>Last Update</th>
							<th>Opsi</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($orders as $o)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $o->name }}</td>
							<td>
								@if($o->status == 0)
									Belum check-out
								@elseif($o->status == 1)
									Sudah check-out<br> Belum dibayar
								@elseif($o->status == 2)
									Sudah dibayar
								@else
									Sudah sampai tujuan<br>
									Transaksi selesai
								@endif
							</td>
							<td>{{ $o->total_harga }}</td>
							<td>{{ date('d/m/Y', strtotime($o->tanggal)) }}</td>
							<td>{{ date('d/m/Y', strtotime($o->updated_at)) }}</td>
							<td>
								<a href="{{ url('pesanan/update') }}/{{ $o->id}}" class="btn btn-success btn-icon-split mb-1"><span class="icon"><i class="fas fa-pencil-alt"></i></span><span class="text">Update</span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!--  -->
	</div>
</div>	
@endsection