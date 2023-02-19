<?php

namespace App\Http\Controllers;

use Alert;
use Session;
use App\User;
use App\Siswa;
use App\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaLoginController extends Controller
{
   
   public function siswaLogin(){
      
       if(session('nama') != null) :  
         return redirect('dashboard/siswa/histori');
       endif;
   
       return view('auth.siswa-login');
   }
   
    public function login(Request $req){
      
         $exists = Siswa::where('nisn', $req->nisn)->exists();
         
         if($exists) :
               $siswa = Siswa::where('nisn', $req->nisn)->get();
               
               foreach($siswa as $val) :
                   Session::put('id', $val->id);
                   $nama = $val->nama;
               endforeach;
               
               if(strtolower($nama) == strtolower($req->nama_siswa)) :
                  
                     Session::put('nama', $nama);
                     Session::put('nisn', $req->nisn);
                     
                     return redirect('dashboard/siswa/histori');
               else :
               
                      Alert::error('Gagal Login!', 'NISN dan nama siswa tidak sesuai');
                     return back();
                     
               endif;
               
            else :
               Alert::error('Gagal Login!', 'Data siswa dengan NISN ini tidak ditemukan');
               return back();
            endif;
    }
   
    public function logout(){
      
        Session::flush();
        return redirect('login/siswa');
      
    }
   
    public function index(){
      
      if(session('nama') == null) :  
         return redirect('login/siswa');
     endif;
       
      $data = [
          'pembayaran' => Pembayaran::where('id_siswa', Session::get('id'))->paginate(10)
      ];
       
      return view('dashboard.siswa.index', $data);
    }

    public function profileSiswa()
    {
        $profile = DB::table('kelas')
        ->join('siswa', 'kelas.id', '=', 'siswa.id_kelas')
        ->where('siswa.id', Session::get('id'))
        ->first();
        return view('dashboard.siswa.profile', compact('profile'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = [
             'user' => User::find(auth()->user()->id),
             'edit' => User::find($id)
         ];
         
         return view('dashboard.siswa.edit', $data);
    }
    public function update(Request $req, $id)
    {
        if($update = User::find($id)) :
            
            if(Hash::check($req->old_pass, $update->password)) :
                 
               $update->update([
                   'nisn' => $req->nama,
                   'nama' => $req->email
                  
              ]);
            
              Alert::success('Berhasil!', 'Data Berhasil di Edit');
              return redirect('dashboard/siswa/history');
            
           else :
               Alert::error('Terjadi Kesalahan!', 'Password Anda tidak Cocok');
            endif;
         endif;
        
        return back();
    }

}
