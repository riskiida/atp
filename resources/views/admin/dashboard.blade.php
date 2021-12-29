@extends('layouts.adminapp')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="row">

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PRODUK</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $produk }}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-tree fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">PENGGUNA</div>
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pengguna }}</div>
							</div>
							<div class="col">                      
							</div>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-user-alt fa-fw fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PESANAN</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesanan }}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-exchange-alt fa-fw fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">ADMIN</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin }}</div>
					</div>
					<div class="col-auto">

						<i class="fas far fa-user-tie fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>         
</div>

<div align="center" class="p-5">
	<img style="width: auto; height: auto;" class="my-5" src="{{ url('images') }}/logo.png" alt="">
</div>
@endsection