<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;

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

        $request->session()->flash('success','Permintaan berhasil di tambahkan');

        return redirect()->back();
    }
}
