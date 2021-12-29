          @extends('layouts.adminapp')
          @section('title')
          {{ $title }}
          @endsection
          @section('content')
          <h1 class="h3 mb-4 text-gray-800">Hello {{ $user->name }}</h1>
          <div class="row">
          <div class="col-md-6">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row">
                  <div class="col-md-4">
                    @if(Auth::user()->gambar=='def_user.png')
                    <img class="card-img" alt="img profile" src="{{url('images/')}}/{{Auth::user()->gambar}}">
                    @else
                    <img class="card-img" alt="img profile" src="{{url('uploads/user')}}/{{Auth::user()->gambar}}">
                    @endif
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $user->name }}</h5>
                      <p class="card-text">Email : {{ $user->email }}</p>
                      <p class="card-text">No. Hp : {{ $user->nohp }}</p>
                      <p class="card-text">Jabatan : {{ $user->roles }}</p>
                      <p class="card-text"><small class="text-muted">Bergabung sejak {{ date_format($user->created_at,"d/m/Y") }}</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card my-2">
                <div class="card-header">                   
                  <h5><i class="fa fa-pencil-alt"></i> Edit Profile</h5>
                </div>
                <div class="card-body">                        
                  <form method="POST" action="{{ url('edit-profile') }}">
                    @csrf
                    <input type="hidden" name="iseditadmin" value="true">
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
                        <button type="submit" class="btn btn-success float-right"><i class="fa fa-check"></i> Simpan</button>
                      </div>
                    </div>                          
                  </form>
                </div>
              </div>
            </div>            
          </div> 
          @endsection
