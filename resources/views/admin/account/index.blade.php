@extends('layouts.adminapp')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="row">
	<div class="col">
	<span class="h3 text-gray-800">Akun Pengguna</span>
	</div>
	<div class="col">
		
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
							<th>Nama</th>
							<th>Email</th>
							<th>Ho. Hp</th>
							<th>Alamat</th>
							<th>Role</th>
							<th>Join</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Ho. Hp</th>
							<th>Alamat</th>
							<th>Role</th>
							<th>Join</th>
							<th>Opsi</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($users as $u)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{ $u->name }}</td>								
								<td>{{ $u->email }}</td>								
								<td>{{ $u->nohp }}</td>								
								<td>{{ $u->alamat }}</td>
								<td>{{ $u->roles }}</td>
								<td>{{ date_format($u->created_at,"d/m/Y") }}</td>
								<td>
									<a href="{{ url('account/update') }}/{{ $u->id}}" class="btn btn-sm btn-success mb-1"><i class="fas fa-pencil-alt"></i></a>
									<form action="{{ url('account/delete') }}/{{$u->id}}" method="post">
			                            @csrf
			                            {{ method_field('DELETE') }}
			                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus akun pengguna ini ?');"><i class="fa fa-trash"></i>
			                                
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