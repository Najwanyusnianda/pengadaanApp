<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaketController extends Controller
{
    //
    public function index(){
        return view('Paket.daftar_paket');
    }

    public function detail(){
        return view('Paket.detail_paket');
    }
}
