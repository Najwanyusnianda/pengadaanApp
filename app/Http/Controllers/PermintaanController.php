<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    //
    public function index(){
        return view('Permintaan.daftar_Permintaan');
    }

    public function create(){
        return view('Permintaan.form_permintaan');
    }
}
