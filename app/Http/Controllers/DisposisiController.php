<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Disposisi;
use App\DisposisiStaff;
use App\Person;
use App\Permintaan;

class DisposisiController extends Controller
{
    //
    public function daftar(){
       
        $disposisi=DB::table('disposisis')->where('penerima_id',auth()->user()->person->id)->join('people AS a','disposisis.pengirim_id','=','a.id')->join('people AS b','disposisis.penerima_id','=','b.id')->join('permintaans','permintaan_id','=','permintaans.id')->select('disposisis.*','a.nama AS nama_pengirim','b.nama AS nama_penerima','permintaans.judul AS judul_permintaan')->get();
        return view('Disposisi.disposisi_daftar',compact('disposisi'));
    }

    public function store(Request $request){
        $user_id=auth()->user()->id;
        $pengirim=Person::where('user_id','=',$user_id)->first();
        //if kulp
        if(auth()->user()->person->role->id == 4){
            $disposisi=Disposisi::create([
                'pengirim_id'=>$pengirim->id,
                'penerima_id'=>$request->penerima,
                'uraian'=>$request->uraian,
                'permintaan_id'=>$request->permintaan_id
            ]);
            
            $permintaan=Permintaan::find($disposisi->permintaan_id);
            $permintaan->disposisi_status='disposisi';
            $permintaan->save();
        }//if kasi
        elseif(auth()->user()->person->role->id == 5){
            $permintaanId =$request->permintaan_id;
            $disposisi=Disposisi::where('permintaan_id',$permintaanId)->first();
            
            $disposisi_staff=DisposisiStaff::create([
                'disposisi_id'=>$disposisi->id,
                'pengirim_id'=>$pengirim->id,//bisa dihapus
                'penerima_id'=>$request->penerima,
                'uraian'=>$request->uraian,
            ]);

            $permintaan=Permintaan::find($disposisi->permintaan_id);
            $permintaan->disposisi_status='dikerjakan';
            $permintaan->save();

        }

        
        return redirect()->back();

    }



    public function form_handling(){
        if(auth()->user()->person->role->id == 4)
        {
            $pegawai=Person::where('role_id','=','5')->get();//kasi
            return view('Disposisi.disposisi_form',compact('pegawai'));
        }elseif (auth()->user()->person->role->id == 5) {
            $pegawai=Person::where('role_id','=','6')->get();//staff
            return view('Disposisi.disposisi_form',compact('pegawai'));
        }
    }


    public function detail($id){

        $disp_detail=Disposisi::find($id);
        return view('Disposisi.disposisi_detail',compact('disp_detail'));
    }
}
