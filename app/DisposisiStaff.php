<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisposisiStaff extends Model
{
    //
    protected $fillable=['pengirim_id','penerima_id','uraian','disposisi_id'];
}
