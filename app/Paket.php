<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    //
    protected $fillable=['permintaan_id','ppk_id','pp_id','penyedia_id','total_hps','paket_storage'];
}
