@extends('layouts.app')

@section('content')
@include('sweetalert::alert')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="width: 35rem;">
                <div class="card-header">{{ __('Login Siswa') }}</div>
                     <!-- <div class="alert alert-success m-3">
                        Login untuk <b>petugas</b> silahkan <a href="{{ url('login') }}" class="text-primary" style="text-decoration:none;">Klik Disini</a>
                     </div> -->
                <div class="card-body">
                    <form method="POST" action="{{ url('login/siswa/proses') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('NISN') }}</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required autofocus>

                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-9">
                                <input id="nama_siswa" type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" value="{{ old('nisn') }}" required>

                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-10">
                                <button type="submit" class="btn text-white" style="background-color: #573E2C;">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
