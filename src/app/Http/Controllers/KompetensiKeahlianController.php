<?php

namespace App\Http\Controllers;

use App\User;
use App\KompetensiKeahlian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KompetensiKeahlianController extends Controller
{
    public function __construct(){
        $this->middleware([
           'auth',
           'privilege:admin'
        ]);
   }
  
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request) 
   {
        if($query = $request->input('query')) {
            $skills = KompetensiKeahlian::where('name', 'LIKE', "%".$query."%");
        }else {
            $skills = KompetensiKeahlian::orderBy('id', 'DESC');
        }
        $data = [
            'skills' => $skills->paginate(10),
            'user' => User::find(auth()->user()->id),
            'query' => $query ?? '',
        ];
       return view('dashboard.data-kompetensi.index', $data);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        $messages = [
           'required' => ':attribute tidak boleh kosong!',
           'unique'   => ':attribute tidak boleh sama!'
        ];
        
        $validasi = $request->validate([
           'name' => 'required',
        ], $messages);
     
        if($validasi) :
            $create = KompetensiKeahlian::create([
                 'name' => $request->name,
           ]);
           
           if($create) :
                Alert::success('Berhasil!', 'Data Berhasil Ditambahkan');
           else :
                Alert::error('Gagal!', 'Data Gagal Ditambahkan');
           endif;
        endif;
     
       return back();
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
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
           'edit' =>  KompetensiKeahlian::find($id),
            'user' => User::find(auth()->user()->id),
        ];
        
        return view('dashboard.data-kompetensi.edit', $data);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $req, $id)
   {
       if($update = KompetensiKeahlian::find($id)) :
              $stat = $update->update([
                 'name' => $req->name,
              ]);
              if($stat) :
                    Alert::success('Berhasil!', 'Data Berhasil di Edit!');
                 else :
                     Alert::success('Terjadi Kesalahan!', 'Data Gagal di Edit!');
                    return back();
                 endif;
        endif;
        
        return redirect('dashboard/data-kompetensi');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       if(KompetensiKeahlian::find($id)->delete()) :
           Alert::success('Berhasil!', 'Data Berhasil Dihapus');
        else :
           Alert::error('Terjadi Kesalahan!', 'Data Gagal Dihapus');
        endif;
        
        return back();
   }
}
