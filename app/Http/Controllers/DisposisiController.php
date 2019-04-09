<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    //
    public function daftar(){
        return view('Disposisi.disposisi_daftar');
    }
}
