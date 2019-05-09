<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SubBagian;
use App\Person;
use App\User;
use DataTables;
use App\JabatanPpk;
use App\JabatanPp;
class UserController extends Controller
{
    //
    public function index(){
        $pelaku=DB::table('people')->join('roles','people.role_id','roles.id')->select('people.*','roles.deskripsi')->get();
        return view('User.user_view',compact('pelaku'));
    }

    public function tableUser(){
        $pelaku=Person::query()->join('roles','people.role_id','roles.id')->select('people.*','roles.deskripsi')->get();

        $dt=DataTables::of($pelaku)
        ->addColumn('action',function(){
            return view('User.user_table._action');
        })->addColumn('status',function($pelaku){
            return view('User.user_table._status',[
                'active'=>$pelaku->is_active ? 'aktif' : 'non-aktif'
            ]);
        })->addColumn('role',function($pelaku){
            return view('User.user_table._role',[
                'role'=>$pelaku->deskripsi ? $pelaku->deskripsi : 'tidak ada'
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action','status','role'])->make(true);
        return $dt;
    }

    public function indexBagian(){
        $subject_matter=DB::table('sub_bagians')->where('kode_bagian_up','<>','1000')->where('kode_bagian_up','LIKE','__00')->where('kode_bagian_up','NOT LIKE','_000')->paginate(10);
        return view('User.bagian_view')->with('subject_matter',$subject_matter);
    }

    public function registerUserForm(){
        return view('User.user_form');
    }

    public function storeRegister(Request $request){

            $user=User::create([
                'username'=>$request->username,
                'password'=>bcrypt($request->password),
                'is_user'=>true,
               
            ]);
    
            $person=Person::create([
                'nama_depan' =>$request->nama,
                'nama_belakang'=>'test',
                'nip' => $request->nip,
                'role_id' => 100,
                'user_id' => $user->id,
                //'role_id'=>1
            ]);
    
            return redirect()->back();
    
    }

    public function availableUser(){
       $pegawai=Person::where('role_id','=',100)->get();
   
       $jabatan_ppk=JabatanPpk::all();
       $jabatan_pp=JabatanPp::all();
       return view('Project.user_available_list',compact('pegawai','jabatan_ppk','jabatan_pp'));
    }

}
