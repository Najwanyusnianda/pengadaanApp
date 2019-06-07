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
use App\SpekHpsItem;
use App\Penyedia;
use App\jadwalPenawaran;
use App\KegiatanPenawaran;
use App\Evaluasi;
use App\EvaluasiKriteria;
use App\EvaluasiPaket;
use DB;

class PaketController extends Controller
{
    //
    public function index(){
        $paket=DB::table('pakets')->join('permintaans','pakets.permintaan_id','=','permintaans.id')->select('pakets.*','permintaans.judul AS judul')->get();
  
        //dd($paket);
        return view('Paket.daftar_paket')->with('paket',$paket);
    }

    public function detail($id){
        $paket=Paket::find($id);
        //dd($id);

        //check true
        $spek=SpekHpsItem::where('paket_id',$paket->id)->get();
        $spek=count($spek);
        $is_not_hps=SpekHpsItem::where('paket_id',$paket->id)->whereNull('harga')->get();
        $is_not_hps=count($is_not_hps);
        $is_not_penawaran=jadwalPenawaran::where('paket_id',$paket->id)->get();
        $is_not_penawaran=count($is_not_penawaran);

        $penyedia=Paket::where('pakets.id',$id)->join('penyedias','pakets.penyedia_id','penyedias.npwp')->select('penyedias.nama','penyedias.npwp')->first();
        $paket_penanggung_jawab=Paket::where('pakets.id',$id)->join('people AS ppk','pakets.ppk_id','ppk.id')->join('people AS pp','pakets.pp_id','pp.id')->select('ppk.nama AS nama_ppk','ppk.nip AS nip_ppk','pp.nama AS nama_pp','pp.nip AS nip_pp')->first();
        return view('Paket.detail_temp')
        ->with('paket',$paket)
        ->with('pj',$paket_penanggung_jawab)
        ->with('penyedia',$penyedia)
        ->with('is_not_hps',$is_not_hps)
        ->with('is_spek',$spek)
        ->with('is_not_penawaran',$is_not_penawaran);
    }

 

    public function spesifikasi($id){
        $id_paket=$id;
        return view('Paket.doc_persiapan.spesifikasi',compact('id_paket'));
    }

    public function spesifikasiStore(Request $request,$id){
        
        $id_paket=$id;
        //dd($request->nama_barang);
        if(count($request->nama_barang)>0){
            $spek=SpekTeknis::create([
                'spesifikasi'=>'test_spesifikasi',
                'keterangan'=>'test_keterangan'
            ]);
            for ($i=0; $i <count($request->nama_barang) ; $i++) { 
                # code...


                $spek=SpekHpsItem::create([
                    'paket_id'=>$id_paket,
                    'spek_id'=>$spek->id,
                    'nama_item'=>$request->nama_barang[$i],
                    'volume'=>$request->volume_barang[$i],
                    'satuan'=>$request->satuan_barang[$i]
                ]);
            }
        }
        
        //dd($spek);
        return redirect()->route('paket.detail.hps',['id'=>$id_paket]);
        //return redirect()->route('paket.detail.hps',['id'=>$id_paket]);
    }

    public function hps($id){
        $id_paket=$id;
        //$spek=SpekTeknis::where('paket_id',$id_paket)->get();
        $hps=SpekHpsItem::where('paket_id',$id_paket)->get();
        
        //buat hps hanya 1 saja
        //dd($hps[0]);
        
        //$hps=SpekHpsItem::where('spek_id',$spek->id)->get();
        return view('Paket.doc_persiapan.hps',compact('id_paket','hps'));
    }

    public function hpsStore(Request $request,$id){
        
        $id_paket=$id;

        $num_item=count($request->id);
        for ($i=0; $i <$num_item ; $i++) { 
         $hps=SpekHpsItem::where('paket_id',$id_paket)->where('id',$request->id[$i])
         ->update([
             'harga'=>$request->harga_satuan[$i],
             'jumlah'=>$request->jumlah[$i]
         ]);
         
        };
        $paket=Paket::find($id);

        $paket->update([
            'total_hps'=>$request->total_hps
        ]);  
        return redirect()->route('paket.detail',['id'=>$id_paket]);

    }

    public function penanggungJawabForm(){
       // $project_active=Project::where('is_active',true)->first();
        //$project_enroll=ProjectEnrollment::where('project_id',$project_active->id)->get();
        $ppk=Person::where('role_id','3')->get();
        $pp=Person::where('role_id','2')->get();

        return view('Paket.penanggung_jawab',compact('ppk','pp'));
    }

    public function pjStore($id,Request $request){
        $paket=Paket::find($id);
        $paket->update([
            'ppk_id'=>$request->ppk,
            'pp_id'=>$request->pp
        ]);
        /*$paket=Paket::create([
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
        ]);*/
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

    public function storePenyedia(Request $request,$id){
        $penyedia=Penyedia::create([
            'npwp'=>$request->npwp,
            'nama'=>$request->nama_penyedia,
            'email'=>$request->email_penyedia,
            'telepon'=>$request->telp_penyedia,
            'alamat'=>$request->alamat_penyedia
        ]);

        $paket=Paket::find($id);
        $paket->update([
            'penyedia_id'=>$penyedia->npwp
        ]);
        
        return redirect()->route('paket.detail',['id'=>$id]);

    }

    public function jadwalPenawaran(Request $request,$id){
        $paket_id=$id;
        $kegiatan_penawaran=KegiatanPenawaran::all();

        return view('Paket.Penawaran.jadwal_penawaran',compact('kegiatan_penawaran','paket_id'));
    }

    public function jadwalPenawaranStore(Request $request,$id){
        
        if(count($request->id_kegiatan_penawaran)>0){
            for ($i=0; $i <count($request->id_kegiatan_penawaran); $i++) { 
                $jadwal_penawaran=jadwalPenawaran::create([
                    'paket_id'=>$id,
                    'kegiatan_penawaran_id'=>$request->id_kegiatan_penawaran[$i],
                    'tanggal_pelaksanaan'=>$request->tanggal_pelaksanaan[$i],
                    'waktu_mulai'=>$request->waktu_mulai[$i],
                    'waktu_selesai'=>$request->waktu_selesai[$i]
                ]);
            }
            return redirect()->route('paket.detail',$id);

        }


        return redirect()->route('paket.detail',['id'=>$id]);

    }


    ///penawaran

    public function formPembukaanPenawaran($id){

        return view('Paket.Penawaran.form_pembukaan_penawaran');

    }


    public function formKlarifikasiNegosiasi(){
        //return view('Paket.penawaran.form_pembukaan_penawaran');
    }

    public function storePembukaanPenawaran(Request $request){

    }



}
