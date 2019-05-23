<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectEnrollment;
use App\Project;
use App\Person;
use DataTables;
use App\Paket;
use App\Permintaan;
use App\KegiatanPengadaan;
use App\JadwalKegiatanPengadaan;

class PaketController extends Controller
{
    //
    public function index(){
        $paket=Paket::query()->join('permintaans','pakets.permintaan_id','=','permintaans.id')->get();
        return view('Paket.daftar_paket')->with('paket',$paket);
    }

    public function detail($id){
        $paket=Paket::find($id);
        return view('Paket.detail_paket')->with('paket',$paket);
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

    public function pjStore(Request $request){
   
        $paket=Paket::create([
            'permintaan_id'=>$request->permintaan_id,
            'ppk_id'=>$request->ppk,
            'pp_id'=>$request->pp
        ]);
    }

    public function storeKak(Request $request){

        $request->file('kak')->store('Kak');
        if( $request->file('kak')){
            
        }
        
        return redirect()->back();
    }


    public function paketTable(){
        $paket=Paket::query();

        $dt=DataTables::of($paket)
        ->addIndexColumn()
        ->make(true);
        return $dt;
    }


    public function kegiatan($id){
        $id_paket=$id;
        $kegiatan_list=KegiatanPengadaan::all();
        return view('Paket.pilih_kegiatan',compact('kegiatan_list','id_paket'));
    }

    public function kegiatanStore(Request $request,$id){
        //dd($request->kegiatan[0]);
        $id_paket=$id;
        for ($index =0; $index <count($request->kegiatan);  $index++ ) {
            $kegiatan=JadwalKegiatanPengadaan::create([
                'paket_id'=>$id_paket,
                'kegiatan_id'=>$request->kegiatan[$index]
            ]);
            
        };
        return redirect()->route('paket.jadwal',[$id_paket]);
    }

    public function jadwalIndex($id){
        $id_paket=$id;
    
        $kegiatan_pengadaan=JadwalKegiatanPengadaan::where('paket_id',$id)->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')->get();
       
        if (count($kegiatan_pengadaan)>0) {
            $paket=Paket::find($id_paket);
           
            $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
          
            $project=Project::where('id',$permintaan->project_id)->first();
            $kode_kegiatan=$permintaan->kode_kegiatan;
            $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
            ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->first();

            $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
            ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->first();
            return view('Paket.jadwal_pengadaan',compact('id_paket','kegiatan_pengadaan','ppk','pp','kode_kegiatan'));
        }else {
            return redirect()->route('paket.pilihKegiatan',['id'=>$id_paket]);
        }


        
    }

    public function storeJadwal(){

    }

}
