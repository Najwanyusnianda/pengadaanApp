<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BagianController extends Controller
{
    //
    public function index(){
        return view('SubBagian.sub_bagian_index');
    }
}
