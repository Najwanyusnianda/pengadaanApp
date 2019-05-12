<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectEnrollment;
use App\Project;
use App\Person;

class PaketController extends Controller
{
    //
    public function index(){
        return view('Paket.daftar_paket');
    }

    public function detail($id){
        return view('Paket.detail_paket');
    }

    public function spesifikasi($id){
        return view('Paket.doc_persiapan.spesifikasi');
    }

    public function hps($id){
        return view('Paket.doc_persiapan.hps');
    }

    public function penanggungJawabForm(){
       // $project_active=Project::where('is_active',true)->first();
        //$project_enroll=ProjectEnrollment::where('project_id',$project_active->id)->get();
        $ppk=Person::where('role_id','3')->get();
        $pp=Person::where('role_id','2')->get();

        return view('Paket.penanggung_jawab',compact('ppk','pp'));
    }

    public function storeKak(Request $request){

        $request->file('kak')->store('Kak');
        if( $request->file('kak')){
            
        }
        
        return redirect()->back();
    }
}
