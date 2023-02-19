@extends('layouts.dashboard-siswa')

@section('breadcrumb')
   <li class="breadcrumb-item">Dashboard</li>
   <li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">     
        <div class="card">
            <div class="card-body">
               <div class="card-title">Profile Siswa</div>
                    <div class="d-flex flex-row comment-row">
                        <i class="mdi mdi-account display-3"></i>
                        <div class="comment-text active w-100">
                        <hr>                               
                            <h6 class="font-medium">Nama, {{ $profile->nama }}</h6>                                       
                            <span class="m-b-15 d-block">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Kelas, {{ $profile->nama_kelas }} </li>
                                    <li class="list-group-item">Nisn, {{ $profile->nisn }} </li>
                                    <li class="list-group-item">Nis, {{ $profile->nis }} <b  class="text-capitalize text-bold"></b></li> 
                                    <li class="list-group-item">Alamat, {{ $profile->alamat }} </li>                                  
                                    <li class="list-group-item">No Tlp, {{ $profile->nomor_telp }} </li>                                  
                                </ul>
                            </span>
                            <div class="comment-footer ">
                                <span class="text-muted float-right"></span>                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection