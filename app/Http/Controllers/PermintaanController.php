<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\User;
use App\Notifications\PermintaanMasuk;
use Illuminate\Support\Facades\Notification;
use DataTables;
use DB;
use App\Project;
use App\KegiatanProgram;
use App\Person;

class PermintaanController extends Controller
{
    //
    public function index(){
       // $permintaan=Permintaan::get();
       //$permintaan=DB::table('permintaans')->join('sub_bagians','permintaans.kode_bagian','=','sub_bagians.kode_bagian')->select('permintaans.*','sub_bagians.nama_bagian')->latest()->get();
       $project=Project::where('is_active',true)->first();
       //$projectid=$project->id;
        return view('Permintaan.daftar_Permintaan',compact('project'));
    }

    public function indexBagian($kode_bagian){
        //nambah project
        $project=Project::where('is_active',true)->first();
        $projectid=$project->id;
        if($projectid){
        $permintaan_bagian=Permintaan::where('kode_bagian',$kode_bagian)->where('project_id',$projectid)->latest()->get();
        return view('Permintaan.daftar_permintaan_bagian',compact('permintaan_bagian'));
        }else{
            return redirect()->back();
        }

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
        $kode_kegiatan=KegiatanProgram::all();
        return view('Permintaan.form_permintaan',compact('kode_kegiatan'));
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

        $project=Project::where('is_active',true)->first();
        $messages = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute harus diisi minimal :min karakter ',
            'max' => ':attribute harus diisi maksimal :max karakter',
        ];
        $validators=$this->validate($request,[
            'judul_permintaan' => 'required|min:5',
            'jenis_pengadaan' => 'required',
            'nomor_form_permintaan' => 'required',
            'kode_kegiatan'=>'required|min:4',
            'output'=>'required|min:5',
            'komponen'=>'required',
            'sub_komponen'=>'required',
            'grup_akun'=>'required',
            'nilai_anggaran'=>'required',
            'date_mulai'=>'required',
            'date_selesai'=>'required',
            'date_buat_form'=>'required',
            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip'
            
        ],$messages);
         /*if ($validators->fails()) {
            return redirect()->back();
         }*/
 
        $file=$request->file('filename');
        
        $name=$file->getClientOriginalName();
        $path= $file->store('public/permintaan');  

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
            'date_created_form'=>date('Y-m-d', strtotime($request->date_buat_form)),
            'file_pendukung'=>$path,
            'project_id'=>$project->id
        ]);
        
        $pegawai=Person::where('role_id','!=','100')->get();
        foreach($pegawai as $temps){
            $data[]=$temps->user_id;
        }
        $users=User::whereIn('id',$data)->get();
        Notification::send($users, new PermintaanMasuk($permintaan));
        //auth()->user()->notify(new PermintaanMasuk($permintaan));
        $request->session()->flash('success','Permintaan berhasil di Tambahkan!');

        return redirect()->route('bagian.permintaan.index',['bagian'=>auth()->user()->sub_bagian->kode_bagian]);
    }

    public function dataTable(){

        $project=Project::where('is_active',true)->first();
        $projectid=$project->id;
        $permintaan=Permintaan::query()->join('sub_bagians','permintaans.kode_bagian','=','sub_bagians.kode_bagian')->where('project_id',$projectid)->select('permintaans.*','sub_bagians.nama_bagian')->latest()->get();
        
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
            })->addColumn('nilai_rp',function($permintaan){
                return view('Permintaan.permintaan_table._nilai',[
                    'number_current'=> "Rp." .number_format($permintaan->nilai,0,',','.').",-"
                ]);
            })
            ->addIndexColumn()->rawColumns(['action','status_disposisi','date_diff','nilai_rp'])->make(true);
        

    }

    public function bagianDataTable(){
    }
}
