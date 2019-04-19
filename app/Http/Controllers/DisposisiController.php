<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Disposisi;
use App\DisposisiStaff;
use App\Person;

class DisposisiController extends Controller
{
    //
    public function daftar(){
       
        $disposisi=DB::table('disposisis')->join('people AS a','disposisis.pengirim_id','=','a.id')->join('people AS b','disposisis.penerima_id','=','b.id')->join('permintaans','permintaan_id','=','permintaans.id')->select('disposisis.*','a.nama AS nama_pengirim','b.nama AS nama_penerima','permintaans.judul AS judul_permintaan')->get();

         

        return view('Disposisi.disposisi_daftar',compact('disposisi'));
    }

    public function store(Request $request){
        $user_id=auth()->user()->id;
        $pengirim=Person::where('user_id','=',$user_id)->first();

        $disposisi=Disposisi::create([
            'pengirim_id'=>$pengirim->id,
            'penerima_id'=>$request->penerima,
            'uraian'=>$request->uraian,
            'permintaan_id'=>$request->permintaan_id
        ]);

        return redirect()->back();

    }

    public function post_disposisi_staff(){

    }


    public function form_handling(){
        $kasi=Person::where('role_id','=','5')->get();
        return view('Disposisi.disposisi_form',compact('kasi'));
    }
}
