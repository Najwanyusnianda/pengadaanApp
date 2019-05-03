<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ppk;
use App\Pp;
use App\Person;

class PaketController extends Controller
{
    //
    public function index(){
        return view('Paket.daftar_paket');
    }

    public function detail(){
        return view('Paket.detail_paket');
    }


    public function penanggungJawabForm(){
        $ppk=Person::where('role_id',3)->get();
        $pp=Pp::all();

        return view('Paket.penanggung_jawab',compact('ppk','pp'));
    }
}
