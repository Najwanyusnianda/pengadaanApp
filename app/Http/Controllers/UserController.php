<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SubBagian;
use App\Person;
class UserController extends Controller
{
    //
    public function index(){
        $pelaku=DB::table('people')->join('roles','people.role_id','roles.id')->select('people.*','roles.deskripsi')->get();
        return view('User.user_view',compact('pelaku'));
    }

    public function indexBagian(){
        $subject_matter=DB::table('sub_bagians')->where('kode_bagian_up','<>','1000')->where('kode_bagian_up','LIKE','__00')->where('kode_bagian_up','NOT LIKE','_000')->paginate(10);
        return view('User.bagian_view')->with('subject_matter',$subject_matter);
    }
}
