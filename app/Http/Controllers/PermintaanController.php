<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\User;
use App\Notifications\PermintaanMasuk;
use Illuminate\Support\Facades\Notification;
use DataTables;
use DB;

class PermintaanController extends Controller
{
    //
    public function index(){
       // $permintaan=Permintaan::get();
       $permintaan=DB::table('permintaans')->join('sub_bagians','permintaans.kode_bagian','=','sub_bagians.kode_bagian')->select('permintaans.*','sub_bagians.nama_bagian')->latest()->get();

        return view('Permintaan.daftar_Permintaan',compact('permintaan'));
    }

    public function indexBagian($kode_bagian){
        $permintaan_bagian=Permintaan::where('kode_bagian',$kode_bagian)->latest()->get();
        return view('Permintaan.daftar_permintaan_bagian',compact('permintaan_bagian'));
    }

    public function editPermintaan($kode_bagian,$id){
        if(auth()->user()->sub_bagian->kode_bagian == $kode_bagian){
        $permintaan_edit=Permintaan::where('id',$id)->first();
        return view('Permintaan.form_permintaan_edit',compact('permintaan_edit'));
        }else{
            return redirect()->back()->withErrors(['msg', 'Tidak dapat diakses']);
        }

    }

    public function updatePermintaan(Request $request,$id){
        $permintaan=Permintaan::find($id);
        $permintaan->update([
            'kode_bagian'=>auth()->user()->sub_bagian->kode_bagian,
            'judul'=>$request->judul_permintaan,
            'jenis_pengadaan'=>$request->jenis_pengadaan,
            'nomor_form'=>$request->nomor_form_permintaan,
            'kode_kegiatan'=>$request->kode_kegiatan,
            'output'=>$request->output,
            'komponen'=>$request->komponen,
            'sub_komponen'=>$request->sub_komponen,
            'grup_akun'=>$request->grup_akun,
            'nilai'=>$request->nilai_anggaran,
            'date_mulai'=> date('Y-m-d', strtotime($request->date_mulai)),
            'date_selesai'=>date('Y-m-d', strtotime($request->date_selesai)),
            'date_created_form'=>date('Y-m-d', strtotime($request->date_buat_form))
        ]);

        return redirect()->route('bagian.permintaan.index',['bagian'=>auth()->user()->sub_bagian->kode_bagian]);
        
    }

    public function deletePermintaan($id){
        $permintaan=Permintaan::findOrFail($id);
        $permintaan->delete();
    }


    public function create(){
        return view('Permintaan.form_permintaan');
    }

    public function detail($id){
        /*$bagian_detail=DB::table('sub_bagians AS a')
        ->join('sub_bagians AS b','a.kode_bagian_up','=','b.kode_bagian')
        ->join('sub_bagians AS c','b.kode_bagian_up','=','c.kode_bagian')
        ->select('a.*','b.nama_bagian As eselonII','c.nama_bagian As eselonI')
        ->get();*/
        $permintaan_detail=DB::table('permintaans')->where('id',$id)
        ->join('sub_bagians AS a','permintaans.kode_bagian','=','a.kode_bagian')
        ->join('sub_bagians AS b','a.kode_bagian_up','=','b.kode_bagian')
        ->join('sub_bagians AS c','b.kode_bagian_up','=','c.kode_bagian')
        ->join('kegiatan_programs AS kegiatan','permintaans.kode_kegiatan','kegiatan.kode_kegiatan')
        ->join('program_ppks AS program','kegiatan.kode_program','program.kode_program')
        ->select('permintaans.*','a.*','b.nama_bagian As eselonII','c.nama_bagian As eselonI','kegiatan.nama_kegiatan','program.nama_program','program.kode_program')
        ->first(); 

  

        return view('Permintaan.detail_permintaan',compact('permintaan_detail'));
    }


    public function save(Request $request){
        $permintaan=Permintaan::create([
            'kode_bagian'=>auth()->user()->sub_bagian->kode_bagian,
            'judul'=>$request->judul_permintaan,
            'jenis_pengadaan'=>$request->jenis_pengadaan,
            'nomor_form'=>$request->nomor_form_permintaan,
            'kode_kegiatan'=>$request->kode_kegiatan,
            'output'=>$request->output,
            'komponen'=>$request->komponen,
            'sub_komponen'=>$request->sub_komponen,
            'grup_akun'=>$request->grup_akun,
            'nilai'=>$request->nilai_anggaran,
            'date_mulai'=> date('Y-m-d', strtotime($request->date_mulai)),
            'date_selesai'=>date('Y-m-d', strtotime($request->date_selesai)),
            'date_created_form'=>date('Y-m-d', strtotime($request->date_buat_form))
        ]);
        
        //$users=User::all();
        //Notification::send($users, new PermintaanMasuk($permintaan));
        auth()->user()->notify(new PermintaanMasuk($permintaan));
        $request->session()->flash('success','Permintaan berhasil di tambahkan');

        return redirect()->route('bagian.permintaan.index',['bagian'=>auth()->user()->sub_bagian->kode_bagian]);
    }

    public function dataTable(){
        $permintaan=Permintaan::query()->join('sub_bagians','permintaans.kode_bagian','=','sub_bagians.kode_bagian')->select('permintaans.*','sub_bagians.nama_bagian')->latest()->get();
        
        return DataTables::of($permintaan)
            ->addColumn('action',function($permintaan){
            return view('Permintaan.permintaan_table._action',[
                'disabled_status'=>($permintaan->disposisi_status == 'baru' and auth()->user()->person->role->id == 4) || ($permintaan->disposisi_status == 'disposisi' and auth()->user()->person->role->id == 5) ? "" : "disabled",
                'data_id'=>$permintaan->id,
                'judul'=>'Disposisi: Pengadaan '.$permintaan->judul,
                'color_status'=>($permintaan->disposisi_status == 'baru' and auth()->user()->person->role->id == 4) || ($permintaan->disposisi_status == 'disposisi' and auth()->user()->person->role->id == 5) ? "#f39c12;" : "#b2bec3",
                "disabled_status_packet"=>($permintaan->disposisi_status =='dikerjakan' and auth()->user()->person->role->id == 6) ? '' : 'disabled',
                'color_status_packet'=>($permintaan->disposisi_status =='dikerjakan' and auth()->user()->person->role->id == 6) ? '#d35400' : '#b2bec3'
            ]);
            })->addColumn('status_disposisi',function($permintaan){
            return view('Permintaan.permintaan_table._disposisiStatus',[
                'disposisi_badge'=>$permintaan->disposisi_status ==  'baru' ? 'badge-danger' : ($permintaan->disposisi_status == 'dikerjakan' ? 'badge-success' : 'badge-warning'),
                'disposisi_status'=>$permintaan->disposisi_status
            ]);
            })->addColumn('date_diff',function($permintaan){
                return view('Permintaan.permintaan_table._judul',[
                    'judul'=>$permintaan->judul,
                    'tgl'=>\Carbon\Carbon::parse($permintaan->created_at)->diffForHumans()
                ]);
            })
            ->addIndexColumn()->rawColumns(['action','status_disposisi','date_diff'])->make(true);
        

    }

    public function bagianDataTable(){
    }
}
