@extends('layouts.adminapp')
@section('title')
  {{ $title }}
@endsection
@section('content')
<div class="row">
	<div class="col">
		<span class="h3 text-gray-800">Update Pesanan Pembeli</span>
	</div>	
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">                        
				<form method="POST" action="{{ url('pesanan/update') }}/{{ $pesanan->id }}" enctype="multipart/form-data">
					@csrf
					<input name="is_update" value="true" type="hidden">
					<div class="form-group row">
						<label for="pembeli" class="col-md-3 col-form-label ">{{ __('Nama Pembeli') }}</label>
						<div class="col-md-9">
							<input id="nama_pembeli" type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_pembeli" required autocomplete="nama_pembeli" autofocus placeholder="Nama Pembeli..." value="{{ $pesanan->name }}" readonly="">

							@error('nama_pembeli')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="totalharga" class="col-md-3 col-form-label ">{{ __('Total Harga (Rp.)') }}</label>
						<div class="col-md-9">
							<input id="totalharga" type="number" class="form-control @error('totalharga') is-invalid @enderror" name="totalharga" required autocomplete="totalharga" placeholder="Rp..." value="{{ $pesanan->total_harga }}" readonly="">
							@error('totalharga')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="tanggalmasuk" class="col-md-3 col-form-label ">{{ __('Tanggal Masuk') }}</label>
						<div class="col-md-9">
							<input id="tanggalmasuk" type="text" class="form-control" name="tanggalmasuk" required placeholder="Tanggal..." value="{{ $pesanan->created_at }}" readonly="">
						</div>
					</div>
					
					<div class="form-group row">
						<label for="status" class="col-md-3 col-form-label ">{{ __('Status') }}</label>

						<div class="col-md-9">
							<select name="status" class="form-control">								
								<option value="1" <?php if($pesanan->status == 1){echo "selected";} ?>>Sudah check-out, belum dibayar</option>
								<option value="2" <?php if($pesanan->status == 2){echo "selected";} ?>>Sudah dibayar</option>
								<option value="3" <?php if($pesanan->status == 3){echo "selected";} ?>>Selesai</option>
							</select>

							@error('status')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>						
					<div class="form-group row">
						<div class="col m-0">
							<button type="submit" class="btn btn-success float-right"><i class="fa fa-check"></i> Simpan</button>
						</div>
					</div>	                        
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card my-2">
			<div class="card-header">
				Detail Pemesanan
			</div>
			<div class="card-body">
				<strong>Alamat pengiriman : {{$pembeli->alamat}} </strong> || <strong> No Hp {{$pembeli->nohp}} </strong> 				
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">							
					<tr>
						<th>No.</th>
						<th>Nama Produk</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Sub-Total</th>
					</tr>
					@foreach($pesanan_detail as $pd)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$pd->nama_produk}}</td>
						<td>{{number_format($pd->jumlah)}} Kg</td>
						<td align="right">Rp. {{number_format($pd->harga)}},-</td>
						<td align="right">Rp. {{number_format($pd->harga_produk * $pd->jumlah)}},-</td>                                
					</tr>
					@endforeach                                
					<tr>                                
						<td align="right" colspan="4"><strong>Total Harga</strong></td>                            
						<td align="right"><strong>Rp. {{number_format($pesanan->total_harga)}},-</strong></td>
					</tr>					
				</table>             
			</div>
		</div>
	</div>
</div>	
@endsection