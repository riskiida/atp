@extends('layouts.adminapp')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="row">
	<div class="col">
		<span class="h3 text-gray-800">Tambah Produk</span>
	</div>	
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">                        
			<form method="POST" action="{{ url('produk/create') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label for="nama_produk" class="col-md-3 col-form-label ">{{ __('Nama Produk') }}<strong>*</strong></label>

						<div class="col-md-9">
							<input id="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" required autocomplete="nama_produk" autofocus placeholder="Nama Produk...">

							@error('nama_produk')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="harga" class="col-md-3 col-form-label ">{{ __('Harga (Rp.)') }}<strong>*</strong></label>

						<div class="col-md-9">
							<input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" required autocomplete="harga" placeholder="Rp...">

							@error('harga')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="stok" class="col-md-3 col-form-label ">{{ __('Stok') }}<strong>*</strong></label>
						<div class="col-md-9">
							<input id="stok" type="number" class="form-control" name="stok" required placeholder="Stok...">
						</div>
					</div>

					<div class="form-group row">
						<label for="file" class="col-md-3 col-form-label ">{{ __('Gambar') }}<strong>*</strong></label>
						<div class="col-md-9">
							<!-- <input id="file" type="file" class="form-control" name="file" required> -->
							<div class="custom-file  " >
								<input type="file" class="custom-file-input" id="file" name="file" required>
								<label class="custom-file-label" for="file">Gambar</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="oldpassword" class="col-md-3 col-form-label ">{{ __('Keterangan') }}<strong>*</strong></label>

						<div class="col-md-9">
							<textarea rows="5" name="keterangan" placeholder="Keterangan..." class="form-control"></textarea>

							@error('keterangan')
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