@extends('layouts.dashboard-siswa')

@section('breadcrumb')
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="width: 35rem;">
                <div class="card-header">{{ __('Edit Profile Siswa') }}</div>
                <div class="card-body">
                  
                   <form method="post" action="{{ url('dashboard/siswa/', $siswa->id)) }}">
                       @csrf
                       @method('put')

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('NISN') }}</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ $siswa->nisn }}" required autofocus>
                                <span class="text-danger">@error('nisn') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-9">
                                <input id="nama_siswa" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $siswa->nama }}" required>
                                <span class="text-danger">@error('nama') {{ $message }} @enderror</span>
                            </div>
                        </div>                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-10">
                              <button type="submit" class="btn btn-success btn-rounded float-right mt-3">
                                 <i class="mdi mdi-check"></i> {{ __('Simpan') }}
                              </button>
                           
                              <a href="{{ url('dashboard/siswa') }}" class="btn btn-primary btn-rounded mt-3">
                                 <i class="mdi mdi-chevron-left"></i> {{ __('Kembali') }}
                              </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection