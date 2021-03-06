<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Disposisi;
use App\DisposisiStaff;
use App\DisposisiHeader;
use App\DisposisiDetail;
use App\Person;
use App\Permintaan;
use App\Paket;
use App\Project;
use App\ProjectEnrollment;
use App\Notifications\disposisiTerkirim;
use Illuminate\Support\Facades\Notification;
use Storage;
use DataTables;

class DisposisiController extends Controller
{
    //
    public function daftar(){
       
        $disposisi=DB::table('disposisis')->where('disposisis.id','2')->join('people AS a','disposisis.pengirim_id','=','a.id')->join('people AS b','disposisis.penerima_id','=','b.id')->join('permintaans','permintaan_id','=','permintaans.id')->select('disposisis.*','a.nama AS nama_pengirim','b.nama AS nama_penerima','permintaans.judul AS judul_permintaan')->get();
        return view('Disposisi.disposisi_daftar',compact('disposisi'));
    }

    



    public function store(Request $request){
       // dd(count($request->penerima));
      
        $user_id=auth()->user()->id;
        $pengirim=Person::where('user_id','=',$user_id)->first();
        $role_id=auth()->user()->person->role->id;
        
        $permintaan=Permintaan::find($request->permintaan_id);
        $uraian=DisposisiDetail::where('permintaan_id',$permintaan->id)->first();
     
        if(empty($uraian)){
       
                    $disposisi_detail=DisposisiDetail::create([
                        'konten'=>$request->uraian,
                        'type'=>'disposisi',
                        'source_id'=>$request->pengirim,
                        'permintaan_id'=>$request->permintaan_id,
                        

                    ]);

                    for ($index = 0; $index < count($request->penerima) ; $index++) {
                        $disposisi_header=DisposisiHeader::create([
                            'from_id'=>$pengirim->id,
                            'to_id'=>$request->penerima[$index],
                            'disposisi_detail_id'=>$disposisi_detail->id
                        ]);
                
                    }
                    foreach($request->penerima as $temps){
                        $data[]=$temps;
                    }
                $penerima=User::whereIn('id',$data)->get();
                    $Notification=Notification::send($penerima,new disposisiTerkirim($disposisi_detail));
                    if($role_id==4){
                        $permintaan=Permintaan::find($disposisi_detail->permintaan_id);
                        $permintaan->disposisi_status='disposisi'; //baru,disposisi,dikerjakan
                        $permintaan->save();
                    }

        }else {

            $uraian=DisposisiDetail::where('permintaan_id',$permintaan->id)->first();
           
            $konten=$uraian->konten;
            //$kontenUpdate=$konten.'<hr><p class=" text-muted text-sm"> diupdate oleh: '.$pengirim->nama.'</p><br><i class="fas fa-quote-right fa-circle"></i>'.$request->uraian;
           //dd($kontenUpdate);
            $uraian->update([
                'konten_updated'=>$konten
            ]);
            for ($index = 0; $index < count($request->penerima) ; $index++) {
                $disposisi_header=DisposisiHeader::create([
                    'from_id'=>$pengirim->id,
                    'to_id'=>$request->penerima[$index],
                    'disposisi_detail_id'=>$uraian->id
                ]);
        
            }
            foreach($request->penerima as $temps){
                $data[]=$temps;
            }
           $penerima=User::whereIn('id',$data)->get();
            $Notification=Notification::send($penerima,new disposisiTerkirim($uraian));
            if ($role_id==5) {
                # code...
                $paket=Paket::create([
                    'permintaan_id'=>$request->permintaan_id,
    
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
                $permintaan=Permintaan::find($uraian->permintaan_id);
                $permintaan->disposisi_status='dikerjakan'; //baru,disposisi,dikerjakan
                $permintaan->save();
            }

        }


      

    }

    public function disposisiUpdate(Request $request,$id){
        
        $detail=DisposisiDetail::find($id);
   
        $detail->update([
            'konten'=>$request->konten
        ]);
    }

    public function disposisiMasuk(){
        $disposisi_masuk=DB::table('disposisi_headers')
        ->where('disposisi_headers.to_id',auth()->user()->person->id)
        ->join('disposisi_details','disposisi_headers.disposisi_detail_id','=','disposisi_details.id')
        ->join('people AS a','disposisi_headers.from_id','=','a.id')
        ->join('people AS b','disposisi_headers.to_id','=','b.id')
        ->join('permintaans','permintaan_id','=','permintaans.id')
        ->select('disposisi_headers.*','disposisi_details.konten','disposisi_details.type','disposisi_details.permintaan_id','a.nama AS nama_pengirim','a.nip AS nip_pengirim','b.nama AS nama_penerima','b.nip AS nip_penerima','permintaans.judul AS judul_permintaan','permintaans.nomor_form')->latest()->paginate(5);
        //$disposisi_masuk=DB::table('disposisi_details')->join('disposisi_headers','disposisi_details.id','=','disposisi_headers.disposisi_detail_id')->get();
        return view('Disposisi.disposisi_masuk',compact('disposisi_masuk'));
    }

    public function disposisiDiteruskan(){
        $disposisi_diteruskan=DB::table('disposisi_headers')
        ->where('disposisi_headers.from_id',auth()->user()->person->id)
        ->join('disposisi_details','disposisi_headers.disposisi_detail_id','=','disposisi_details.id')
        ->join('people AS a','disposisi_headers.from_id','=','a.id')
        ->join('people AS b','disposisi_headers.to_id','=','b.id')
        ->join('permintaans','permintaan_id','=','permintaans.id')
        ->select('disposisi_headers.*','disposisi_details.konten','disposisi_details.id AS konten_id','disposisi_details.type','disposisi_details.permintaan_id','a.nama AS nama_pengirim','a.nip AS nip_pengirim','b.nama AS nama_penerima','b.nip AS nip_penerima','permintaans.judul AS judul_permintaan')->latest()->paginate(5);
        
        return view('Disposisi.disposisi_diteruskan',compact('disposisi_diteruskan'));
    }



    public function form_handling(){
        if(auth()->user()->person->role->id == 4)
        {
            $pegawai=Person::where('role_id','=','5')->get();//kasi
            

            $ppk=Person::where('role_id','=','3')->get();
            return view('Disposisi.disposisi_form',compact('pegawai','ppk'));
        }elseif (auth()->user()->person->role->id == 5) {
            $pegawai=Person::where('role_id','=','6')->get();//staff
            return view('Disposisi.disposisi_form',compact('pegawai'));
        }
    }




    public function detail($id){
        $disp_detail=DB::table('disposisi_headers')->where('disposisi_headers.id',$id)
        ->join('disposisi_details','disposisi_details.id','=','disposisi_headers.disposisi_detail_id')
        ->join('people AS a','disposisi_headers.from_id','=','a.id')->join('people AS b','disposisi_headers.to_id','=','b.id')
        ->join('permintaans','permintaan_id','=','permintaans.id')
        ->select('disposisi_headers.*','disposisi_details.*','disposisi_details.id AS konten_id','a.nama AS nama_pengirim','a.nip AS nip_pengirim','b.nama AS nama_penerima','b.nip AS nip_penerima','permintaans.judul AS judul_permintaan')->first();
       
        
        return view('Disposisi.disposisi_detail',compact('disp_detail'));
    }

    public function tableMasuk(){
        
        $role_id=auth()->user()->person->role->id;
        if ($role_id==4 || $role_id==5) {
            $disposisi=Disposisi::query()->where('disposisis.penerima_id','=',$auth_id=auth()->user()->person->id)
            ->join('people AS a','disposisis.pengirim_id','=','a.id')
            ->join('people AS b','disposisis.penerima_id','=','b.id')
            ->join('permintaans','permintaan_id','=','permintaans.id')
            ->select('disposisis.*','a.nama AS nama_pengirim','b.nama AS nama_penerima','permintaans.judul AS judul_permintaan')
            ->get();
        }elseif ($role_id==6) {
            //$disposisi=DisposisiStaff::query()->where('disposisi_staff.penerima_id','=',$auth_id=auth()->user()->person->id)->join('disposisis','disposisi_staff.disposisi_id','=','disposisis.id')->join('people AS b','disposisis.penerima_id','=','b.id')->join('people AS a','disposisi_staff.penerima_id','=','a.id')->join('permintaans','disposisis.permintaan_id','=','permintaans.id')->select('disposisi_staff.*','a.nama AS nama_penerima','b.nama AS nama_pengirim','permintaans.judul AS judul_permintaan')->get();
            $disposisi=DisposisiStaff::query()
            ->where('disposisi_staff.penerima_id','=',$auth_id=auth()->user()->person->id)
            ->join('disposisis','disposisi_staff.disposisi_id','=','disposisis.id')
            ->join('people AS b','disposisis.penerima_id','=','b.id')
            ->join('people AS a','disposisi_staff.penerima_id','=','a.id')
            ->join('permintaans','disposisis.permintaan_id','=','permintaans.id')
            ->select('disposisi_staff.*','a.nama AS nama_penerima','b.nama AS nama_pengirim','permintaans.judul AS judul_permintaan')
            ->get();
      
        }
       

        $dt= DataTables::of($disposisi)->addColumn('detail',function($disposisi){
            return view('Disposisi.Disposisi_table._detail',[
                'data_id'=>$disposisi->id
            ]);
            })->addColumn('tgl_masuk',function($disposisi){
            return view('Disposisi.Disposisi_table._dateMasuk',
            [
                'date'=>\Carbon\Carbon::parse($disposisi->created_at)->format('d, M Y')
            ]);
        })->addIndexColumn()->rawColumns(['detail','tgl_masuk'])->make(true);
        
        return $dt;
        
    }
}
