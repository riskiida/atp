@extends('layouts.adminapp')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="row">
	<div class="col">
	<span class="h3 text-gray-800">Produk</span>
	</div>
	<div class="col">
		<a href="{{ url('produk/create') }}" class="btn btn-success btn-icon-split float-right">
			<span class="icon"><i class="fas fa-plus"></i></span><span class="text">Produk</span>
		</a>
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
							<th>Gambar</th>
							<th>Nama</th>
							<th>Stok</th>
							<th>Harga</th>
							<th>Keterangan</th>
							<th>Last Update</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No.</th>
							<th>Gambar</th>
							<th>Nama</th>
							<th>Stok</th>
							<th>Harga</th>
							<th>Keterangan</th>
							<th>Last Update</th>
							<th>Opsi</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($produk as $pro)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>
          							<img src="{{ url('uploads') }}/{{ $pro->gambar}}" width="200"  alt="img produk">
								</td>
								<td>{{ $pro->nama_produk }}</td>
								<td>{{ $pro->stok }}</td>
								<td>{{ $pro->harga }}</td>
								<td>{{ $pro->keterangan }}</td>
								<td>{{ $pro->updated_at }}</td>
								<td>
									<a href="{{ url('produk/update') }}/{{ $pro->id}}" class="btn btn-sm btn-success mb-1"><i class="fas fa-pencil-alt"></i></a>
									<form action="{{ url('produk/delete') }}/{{$pro->id}}" method="post">
			                            @csrf
			                            {{ method_field('DELETE') }}
			                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus produk ?');"><i class="fa fa-trash"></i>
			                                
			                            </button>
			                            
			                        </form>
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