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
use App\PaketDokumen;
use DB;

class PaketController extends Controller
{
    //
    public function index(){
        $paket=DB::table('pakets')->join('permintaans','pakets.permintaan_id','=','permintaans.id')->select('pakets.*','permintaans.judul AS judul')->get();
    
        //dd($paket);
        return view('Paket.daftar_paket')->with('paket',$paket);
    }

    public function indexMe($id){
        $my_id=auth()->user()->person->id;
        if($my_id !=$id){
            return redirect()->back();
        }
        return view('Paket.my_paket');



    }

    public function detail($id){
        $paket=Paket::find($id);
        //dd($id);

        $penyedia=Penyedia::where('npwp',$paket->penyedia_id)->first();
        $dokumen=PaketDokumen::where('paket_id',$paket->id)->get();

        //check true
        /*$spek=SpekHpsItem::where('paket_id',$paket->id)->get();
        $spek=count($spek);
        $is_not_hps=SpekHpsItem::where('paket_id',$paket->id)->whereNotNull('harga')->get();
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
        ->with('is_not_penawaran',$is_not_penawaran);*/
        $jadwal_pengadaan=JadwalKegiatanPengadaan::where('paket_id',$id)
        ->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')
        ->select('kegiatan_pengadaans.nama_kegiatan_p','kegiatan_pengadaans.kode_kegiatan_p','kegiatan_pengadaans.kode_format','jadwal_kegiatan_pengadaans.*')->get();
        $spesifikasi=SpekHpsItem::where('paket_id',$id)->get();
        $paket_penanggung_jawab=Paket::where('pakets.id',$id)
        ->join('people AS ppk','pakets.ppk_id','ppk.id')->join('people AS pp','pakets.pp_id','pp.id')
        ->select('ppk.nama AS nama_ppk','ppk.nip AS nip_ppk','pp.nama AS nama_pp','pp.nip AS nip_pp')->first();
        return view('Paket.detail_paket')
        ->with('paket',$paket)
        ->with('spesifikasi',$spesifikasi)
        ->with('pj',$paket_penanggung_jawab)
        ->with('jadwal_pengadaan',$jadwal_pengadaan)
        ->with('dokumen',$dokumen)
        ->with('penyedia',$penyedia);
    }

    public function persiapan($id){
        $id_paket=$id;
        $paket=Paket::find($id);
        $spek=SpekHpsItem::where('paket_id',$id_paket)->get();
        $spek=count($spek);
        $is_not_hps=SpekHpsItem::where('paket_id',$id_paket)->whereNull('harga')->get();
        //dd($is_not_hps);
        $is_not_hps=count($is_not_hps);
        
        return view('Paket.doc_persiapan.persiapan')
        ->with('paket',$paket)
        ->with('is_not_hps',$is_not_hps)
        ->with('is_spek',$spek);

    }

    public function spesifikasi($id){
        $id_paket=$id;
        $spek_item=SpekHpsItem::where('paket_id',$id_paket)->get();
        $spek_first=SpekHpsItem::where('paket_id',$id_paket)->first();
        if(!empty($spek_first)){
            $spek_teknis=SpekTeknis::where('id',$spek_first->spek_id)->first();
        }else{
            $spek_teknis=[];
        }

        return view('Paket.doc_persiapan.spesifikasi',compact('id_paket','spek_item','spek_teknis'));
    }

    public function spesifikasiStore(Request $request,$id){
        
        $id_paket=$id;
      
        if(count($request->nama_barang)>0){
            $spek=SpekTeknis::create([
                'spesifikasi'=>$request->spek_barang,
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
        $request->session()->flash('success','Spesifikasi teknis telah dibuat');
        return redirect()->back();
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
        return redirect()->route('paket.persiapan',['id'=>$id_paket]);

    }


    public function sendPermohonan($id){
        $pengirim_id=auth()->user()->person->id;
        $paket=Paket::find($id);
        $penerima_id=$paket->pp_id;
        $permintaan_id=$paket->permintaan_id;
        $type="Permohonan Pengadaan";

        if($paket->ppk_id==$pengirim){
            $data="kesalahan";
            return response()->json($data);
        }else{

        }


    }

    public function penanggungJawab($id){
        $paket=Paket::find($id);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();

        $project=Project::where('id',$permintaan->project_id)->first();
        $ppk=ProjectEnrollment::where('project_id',$project->id)->where('id_role',3)
        ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')
        ->join('people','project_enrollments.person_id','people.id')
        ->select('people.id AS id_pegawai','people.nama','people.nip','jabatan_ppks.*')
        ->get();
        $pp=ProjectEnrollment::where('project_id',$project->id)->where('id_role',2)
        ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')
        ->join('people','project_enrollments.person_id','people.id')
        ->select('people.id AS id_pegawai','people.nama','people.nip','jabatan_pps.*')
        ->get();
        
        
        
        $paket=Paket::find($id);
        return view('Paket.pj')
        ->with('paket',$paket)
        ->with('ppk',$ppk)
        ->with('pp',$pp);

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
            'ppk_id'=>$request->ppk_id,
            'pp_id'=>$request->pp_id,
            'status'=>"jadwal_pengadaan"
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
        $request->session()->flash('success','Penanggungjawab telah ditambahkan');
        return redirect()->back();
    }

    public function storeKak(Request $request){

        $request->file('kak')->store('Kak');
        if( $request->file('kak')){
            
        }
        
        return redirect()->back();
    }


    public function paketTable(){
        $paket=Paket::query()->join('permintaans','pakets.permintaan_id','=','permintaans.id')->select('pakets.*','permintaans.judul AS judul')->get();
  
        //dd($paket);

        $dt=DataTables::of($paket)
        ->addColumn('action',function($paket){
            return view('Paket.tabel_paket._action_paket',['id_paket'=>$paket->id]);
        })
        ->addColumn('status',function($paket){
            return view('Paket.tabel_paket._status_paket',[
                'id_paket'=>$paket->id,
                'status_paket'=>$paket->status
                ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action','status'])
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
       //return redirect()->route('paket.detail',['id'=>$id]);
       $request->session()->flash('success','Jadwal Pengadaan Telah berhasil di buat');
       return redirect()->back();
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
            'alamat'=>$request->alamat_penyedia,
            'nama_pimpinan'=>$request->nama_pimpinan,
            'jabatan_pimpinan'=>$request->jabatan_pimpinan
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

        return view('Paket.penawaran.jadwal_penawaran',compact('kegiatan_penawaran','paket_id'));
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
            return redirect()->route('paket.index');

        }


        return redirect()->route('paket.index');

    }
    //upload
    public function uploadPenawaranIndex($id){
        $paket=Paket::find($id);
        return view('Paket.penawaran.penawaran_upload',compact('paket'));

    }
    public function uploadPenawaranStore(Request $request,$id){
        $paket=Paket::find($id);
        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip'
        ]);
        
        if($request->hasfile('filename'))
        {

            $file=$request->file('filename');
        
            $name=$file->getClientOriginalName();
            $path= $file->store('public/files/'.$paket->paket_storage);  
    
           $file = PaketDokumen::create([
            'paket_id'=>$paket->id,
            'subject' =>  $name,
            'document_file' => $path,
            'type'=>'penawaran'
            ]);
            
        }
/*
        $file= new PaketDokumen();
        $file->type="penawaran";
        $file->document_file=json_encode($data);*/
        
    
     

       return back()->with('success', 'Your files has been successfully added');
    }

    ///penawaran
    public function pembukaan($id){
        $id_paket=$id;
        $paket=Paket::find($id);
        return view('Paket.penawaran.pembukaan')->with('paket',$paket);
        
    }

    public function klarifikasi_teknis($id){
        $id_paket=$id;
        $item_spek=SpekHpsItem::where('paket_id',$id_paket)->get();
        return view('Paket.penawaran.form_klarifikasi_teknis')->with('item_spek',$item_spek)->with('id_paket',$id_paket);
    }
    public function klarifikasi_teknis_store(Request $request,$id){
       
        
        $item_id=$request->id;
        if(count($item_id)>0){
            
            for ($i=0; $i <count($item_id); $i++) { 
                $spek_item=SpekHpsItem::where('paket_id')->where('id',$item_id[$i])
                ->update([
                    'harga_penawaran'=>$request->harga_satuan_penawaran[$i],
                    'harga_nego'=>$request->harga_satuan_nego[$i],
                    'jumlah_penawaran'=>$request->jumlah_penawaran[$i],
                    'jumlah_nego'=>$request->jumlah_nego[$i],
                    
                ]);
            }
            $paket=Paket::find($id);
            $paket->update([
                'total_penawaran'=>$request->total_penawaran,
                'total_negosiasi'=>$request->total_nego
            ]); 
            return redirect()->back()->with("success","data berhasil disimpan");
        }
        
    }

    public function formPembukaanPenawaran($id){
        
        //nex
        $id_paket=$id;
        $paketEvaluasi=EvaluasiPaket::where('evaluasi_pakets.id_paket',$id)
        ->join('evaluasi_kriterias','evaluasi_kriterias.id','evaluasi_pakets.id_kriteria')
        ->select('evaluasi_kriterias.id_evaluasi','evaluasi_pakets.*')
        ->get();

        $paketDokumen=EvaluasiPaket::where('evaluasi_pakets.id_paket',$id)
        ->join('evaluasi_kriterias','evaluasi_kriterias.id','evaluasi_pakets.id_kriteria')
        ->select('evaluasi_kriterias.id_evaluasi','evaluasi_pakets.*')
        ->where('id_evaluasi','PD')
        ->orderBy('id_kriteria','ASC')
        ->get();

        $pembukaan_dokumen=EvaluasiKriteria::where('id_evaluasi','PD')->get();
     
        return view('Paket.penawaran.form_pembukaan_penawaran')
        ->with('id_paket',$id)
        ->with('doc_kriteria',$pembukaan_dokumen)
        ->with('eval_dokumen',$paketDokumen);


    }


    public function formKlarifikasiNegosiasi(){
        //return view('Paket.penawaran.form_pembukaan_penawaran');
    }

    public function storePembukaanPenawaran(Request $request,$id){
        
        if ($request->kelengkapan) {
            
            for ($i=0; $i <count($request->kelengkapan) ; $i++) { 
                $pembukaan_dokumen=EvaluasiPaket::create([
                    'id_paket'=>$id,
                    'id_kriteria'=>$request->kriteria_id[$i],
                    'status_evaluasi'=>$request->kelengkapan[$i],
                    'hasil_evaluasi'=>$request->kelengkapan[$i] 
                ]);
            }
        }
        return redirect()->back()->with("success","data berhasil disimpan");
    }

    public function formEvaluasiPenawaran($id){
        $id_paket=$id;
    
        $paketEvaluasi=EvaluasiPaket::where('evaluasi_pakets.id_paket',$id)
        ->join('evaluasi_kriterias','evaluasi_kriterias.id','evaluasi_pakets.id_kriteria')
        ->select('evaluasi_kriterias.id_evaluasi','evaluasi_pakets.*')
        ->get();
        
        $paketAdministrasi=EvaluasiPaket::where('evaluasi_pakets.id_paket',$id)
        ->join('evaluasi_kriterias','evaluasi_kriterias.id','evaluasi_pakets.id_kriteria')
        ->select('evaluasi_kriterias.id_evaluasi','evaluasi_pakets.*')
        ->where('id_evaluasi','EA')
        ->orderBy('id_kriteria','ASC')
        ->get();
        $paketKualifikasi=EvaluasiPaket::where('evaluasi_pakets.id_paket',$id)
        ->join('evaluasi_kriterias','evaluasi_kriterias.id','evaluasi_pakets.id_kriteria')
        ->select('evaluasi_kriterias.id_evaluasi','evaluasi_pakets.*')
        ->where('id_evaluasi','EK')
        ->orderBy('id_kriteria','DESC')
        ->get();
        $paketHarga=EvaluasiPaket::where('evaluasi_pakets.id_paket',$id)
        ->join('evaluasi_kriterias','evaluasi_kriterias.id','evaluasi_pakets.id_kriteria')
        ->select('evaluasi_kriterias.id_evaluasi','evaluasi_pakets.*')
        ->where('id_evaluasi','EH')
        ->orderBy('id_kriteria','DESC')
        ->get();
        $paketTeknis=EvaluasiPaket::where('evaluasi_pakets.id_paket',$id)
        ->join('evaluasi_kriterias','evaluasi_kriterias.id','evaluasi_pakets.id_kriteria')
        ->select('evaluasi_kriterias.id_evaluasi','evaluasi_pakets.*')
        ->where('id_evaluasi','ET')
        ->orderBy('id_kriteria','DESC')
        ->get();
     
        $evaluasiAdministrasi=EvaluasiKriteria::where('id_evaluasi','EA')->get();
        $evaluasiKualifikasi=EvaluasiKriteria::where('id_evaluasi','EK')->get();
        $evaluasiHarga=EvaluasiKriteria::where('id_evaluasi','EH')->get();
        $evaluasiTeknis=EvaluasiKriteria::where('id_evaluasi','ET')->get();

      
        
        return view('Paket.Penawaran.form_evaluasi_paket')
        ->with('id_paket',$id_paket)
        ->with('administrasi',$evaluasiAdministrasi)
        ->with('kualifikasi',$evaluasiKualifikasi)
        ->with('harga',$evaluasiHarga)
        ->with('teknis',$evaluasiTeknis)
        ->with('eval',$paketEvaluasi)
        ->with('eval_adm',$paketAdministrasi)
        ->with('eval_kualifikasi',$paketKualifikasi)
        ->with('eval_harga',$paketHarga)
        ->with('eval_teknis',$paketTeknis);
    

    }

    public function evaluasiStore($id,Request $request){
      
        if (!empty($request->syarat_verifikasi)) {
          
            for ($i=0; $i <count($request->kriteria_id) ; $i++) { 
                $evaluasi=EvaluasiPaket::create([
                    'id_paket'=>$id,
                    'id_kriteria'=>$request->kriteria_id[$i],
                    'status_evaluasi'=>$request->syarat_verifikasi[$i],
                    'hasil_evaluasi'=>$request->syarat_verifikasi[$i]     
                ]);
            }
        }
        return redirect()->back()->with("success","Data berhasil disimpan");
    }



}
