<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\JabatanPpk;
Use App\JabatanPp;
use App\Pp;
use App\Ppk;
class UserSettingController extends Controller
{
    //

    public function getPejabatSetting(){
        $jabatan_ppk=JabatanPpk::all();
        $jabatan_pp=JabatanPp::all();
        return view('Setting.pejabat_setting',compact('jabatan_ppk'));
    }

    public function getPpSetting(){
        return view('Setting.pp_setting');
    }
}
