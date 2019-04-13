<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use App\DisposisiStaff;
use App\Person;

class DisposisiController extends Controller
{
    //
    public function daftar(){
       
        //$disposisi=DB::table('disposisis')->join('people AS a,disposisis.pengirim_id','=','a.id');

        return view('Disposisi.disposisi_daftar');
    }

    public function store(Request $request){
        $user_id=auth()->user()->id;
        $pengirim=Person::where('user_id','=',$user_id)->get();

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
}
