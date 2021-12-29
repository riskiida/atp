@extends('layouts.adminapp')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="row">
	<div class="col">
		<span class="h3 text-gray-800">Tambah Admin Baru</span>
	</div>	
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">                        
			<form method="POST" action="{{ url('account/create') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label for="nama_produk" class="col-md-3 col-form-label ">{{ __('Nama Lengkap') }}<strong>*</strong></label>

						<div class="col-md-9">
							<input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="name" required autocomplete="nama_lengkap" autofocus placeholder="Nama Admin...">

							@error('nama_lengkap')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-md-3 col-form-label ">{{ __('E-mail') }}<strong>*</strong></label>

						<div class="col-md-9">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="E-mail...">

							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="nohp" class="col-md-3 col-form-label ">{{ __('No. Hp') }}<strong>*</strong></label>
						<div class="col-md-9">
							<input id="nohp" type="text" class="form-control" name="nohp" required placeholder="No Hp...">
						</div>
					</div>

					<div class="form-group row">
						<label for="alamat" class="col-md-3 col-form-label ">{{ __('Alamat') }}<strong>*</strong></label>
						<div class="col-md-9">
							<textarea rows="5" name="alamat" placeholder="Alamat..." class="form-control"></textarea>
							@error('alamat')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="password" class="col-md-3 col-form-label ">{{ __('Password') }}<strong>*</strong></label>
						<div class="col-md-9">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="Password..." value="atp123456">
 							<small class="form-text text-success">Hint : Default password = atp123456</small>
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>						
					<div class="form-group row">
						<div class="col-md-3 ">
							<strong>*Wajib diisi</strong>
						</div>
						<div class="col-md-9 m-0">
							<button type="submit" class="btn btn-success float-right"><i class="fa fa-check"></i> Simpan</button>
						</div>
					</div>	                        
				</form>
			</div>
		</div>
	</div>
</div>	
@endsection