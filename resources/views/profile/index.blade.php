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
					<li class="breadcrumb-item active" aria-current="page">My Profile</li>
				</ol>
			</nav>
		</div> 
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">						
					<h4><i class="fa fa-user"></i> My Profile</h4>
				</div>                        
				<div class="card-body">                        
					<table class="table">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>{{$user->name}}</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>:</td>
							<td>{{$user->email}}</td>
						</tr>
						<tr>
							<td>No HP</td>
							<td>:</td>
							<td>{{$user->nohp}}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>{{$user->alamat}}</td>
						</tr>                            
					</table>                        
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card mt-3">
				<div class="card-header">                		
					<h4><i class="fa fa-pencil-alt"></i> Edit Profile</h4>
				</div>
				<div class="card-body">                        
					<form method="POST" action="{{ url('edit-profile') }}">
						@csrf

						<div class="form-group row">
							<label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nama') }}<strong>*</strong></label>

							<div class="col-md-9">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-mail') }}<strong>*</strong></label>

							<div class="col-md-9">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="nohp" class="col-md-3 col-form-label text-md-right">{{ __('No HP') }}<strong>*</strong></label>
							<div class="col-md-9">
								<input id="nohp" type="text" class="form-control" name="nohp" value="{{ $user->nohp }}" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="alamat" class="col-md-3 col-form-label text-md-right">{{ __('Alamat') }}<strong>*</strong></label>
							<div class="col-md-9">
								<input id="alamat" type="text" class="form-control" name="alamat" value="{{ $user->alamat }}" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="oldpassword" class="col-md-3 col-form-label text-md-right">{{ __('Ketik Password Lama') }}<strong>*</strong></label>

							<div class="col-md-9">
								<input id="oldpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="oldpassword" required autocomplete="new-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password Baru') }}</label>

							<div class="col-md-9">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Ketik Ulang Password') }}</label>

							<div class="col-md-9">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 text-md-right">
								<strong>*Wajib diisi</strong>
							</div>
							<div class="col-md-9 m-0">
								<button type="submit" class="btn btn-primary float-right"><i class="fa fa-check"></i> Simpan</button>
							</div>
						</div>	                        
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
