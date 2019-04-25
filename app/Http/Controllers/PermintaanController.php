<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\User;
use App\Notifications\PermintaanMasuk;
use Illuminate\Support\Facades\Notification;
use DataTables;

class PermintaanController extends Controller
{
    //
    public function index(){
        $permintaan=Permintaan::get();
        return view('Permintaan.daftar_Permintaan',compact('permintaan'));
    }

    public function create(){
        return view('Permintaan.form_permintaan');
    }

    public function detail($id){
        $permintaan=Permintaan::find($id);
        return view('Permintaan.detail_permintaan',compact('permintaan'));
    }


    public function save(Request $request){
        $permintaan=Permintaan::create([
            'nama_bagian'=>'Bagian Transformasi Statistik',
            'judul'=>$request->judul_permintaan,
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

        return redirect()->back();
    }

    public function dataTable(){
        $permintaan=Permintaan::query();
        return DataTables::of($permintaan)
            ->addColumn('action',function($permintaan){
            return view('Permintaan.permintaan_table._action',[
                'disabled_status'=>($permintaan->disposisi_status == 'baru' and auth()->user()->person->role->id == 4) || ($permintaan->disposisi_status == 'disposisi' and auth()->user()->person->role->id == 5) ? "" : "disabled"
            ]);
        })->addColumn('status_disposisi',function($permintaan){
            return view('Permintaan.permintaan_table._disposisiStatus',[
                'disposisi_badge'=>$permintaan->disposisi_status ==  'baru' ? 'badge-danger' : ($permintaan->disposisi_status == 'dikerjakan' ? 'badge-success' : 'badge-warning'),
                'disposisi_status'=>$permintaan->disposisi_status
            ]);
        })->addIndexColumn()->rawColumns(['action','status_disposisi'])->make(true);
        

    }
}
