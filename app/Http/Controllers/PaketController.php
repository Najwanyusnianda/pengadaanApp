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
use App\SpekTeknis;
use DB;

class PaketController extends Controller
{
    //
    public function index(){
        $paket=Paket::query()->join('permintaans','pakets.permintaan_id','=','permintaans.id')->get();
        return view('Paket.daftar_paket')->with('paket',$paket);
    }

    public function detail($id){
        $paket=Paket::find($id);
        return view('Paket.detail_temp')->with('paket',$paket);
    }

 

    public function spesifikasi($id){
        $id_paket=$id;
        return view('Paket.doc_persiapan.spesifikasi',compact('id_paket'));
    }

    public function spesifikasiStore(Request $request,$id){
        $id_paket=$id;
        $spek=SpekTeknis::create([
            'paket_id'=>$id_paket,
            'nama_item'=>$request->nama_barang,
            'volume'=>$request->volume_barang,
            'satuan'=>$request->satuan_barang
        ]);
        return redirect()->back();
        //return redirect()->route('paket.detail.hps',['id'=>$id_paket]);
    }

    public function hps($id){
        $id_paket=$id;
        $hps=SpekTeknis::where('paket_id',$id_paket)->get();
        return view('Paket.doc_persiapan.hps',compact('id_paket','hps'));
    }

    public function hpsStore(Request $request,$id){
        $id_paket=$id;
        $num_item=count($request->id);
        for ($i=0; $i <$num_item ; $i++) { 
         $hps=SpekTeknis::where('paket_id',$id_paket)->where('id',$request->id[$i])
         ->update([
             'harga'=>$request->harga_satuan[$i],
             'jumlah'=>$request->jumlah[$i]
         ]);
         
        };
        $paket=Paket::find($id);
        $paket->total_hps=$request->total_hps;  

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
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();

        $paket_date=\Carbon\Carbon::parse($paket->created_at)->format('Y_m_d_his');
        $store_link=$project->project_storage.'/'.$paket_date.'_'.$judul;
        $storage=Storage::makeDirectory($store_link);

        $paket->update([
            'paket_storage'=>$store_link
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
        $temp=JadwalKegiatanPengadaan::where('paket_id',$id_paket)->get();
        if(count($temp)>0){
            foreach($temp as $temps){
                $data[]=$temps->paket_id;
            }
            DB::table('jadwal_kegiatan_pengadaans')->whereIn('paket_id',$data)->delete();
            for ($index =0; $index <count($request->kegiatan);  $index++ ) {
                $kegiatan=JadwalKegiatanPengadaan::create([
                    'paket_id'=>$id_paket,
                    'kegiatan_id'=>$request->kegiatan[$index]
                ]);
                
            };
        }else{
            for ($index =0; $index <count($request->kegiatan);  $index++ ) {
                $kegiatan=JadwalKegiatanPengadaan::create([
                    'paket_id'=>$id_paket,
                    'kegiatan_id'=>$request->kegiatan[$index]
                ]);
                
            };
        }
  
        return redirect()->route('paket.jadwal',[$id_paket]);
    }

    public function jadwalIndex($id){
        $id_paket=$id;
    
        $kegiatan_pengadaan=JadwalKegiatanPengadaan::where('paket_id',$id)->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')->get();
       
        if (count($kegiatan_pengadaan)>0) {
            $paket=Paket::find($id_paket);
            
            $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
            $judul=$permintaan->judul;
            $project=Project::where('id',$permintaan->project_id)->first();
            
            $kode_kegiatan=$permintaan->kode_kegiatan;
            $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
            ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->first();

            $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
            ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->first();
            return view('Paket.jadwal_pengadaan',compact('id_paket','kegiatan_pengadaan','ppk','pp','kode_kegiatan','judul'));
        }else {
            return redirect()->route('paket.pilihKegiatan',['id'=>$id_paket]);
        }


        
    }

    public function jadwalStore(Request $request,$id){
     

       $index=count($request->id_kegiatan);
       for ($i=0; $i <$index ; $i++) { 
           $jadwal=JadwalKegiatanPengadaan::where('paket_id',$id)->where('kegiatan_id',$request->id_kegiatan[$i])
           ->update([
               'jadwal_kegiatan'=>$request->jadwal[$i],
               'nomor_kegiatan'=>$request->nomor[$i]
           ]);
       }
       return redirect()->route('paket.detail',['id'=>$id]);
    }


    //pl
    public function formPenyedia($id){
        
        return view('Paket.penawaran.form_penyedia')->with('id_paket',$id);
    }


    ///penawaran

    public function formPembukaanPenawaran($id){

        return view('Paket.penawaran.form_pembukaan_penawaran');

    }

    public function formKlarifikasiNegosiasi(){
        //return view('Paket.penawaran.form_pembukaan_penawaran');
    }

    public function storePembukaanPenawaran(Request $request){

    }



}
