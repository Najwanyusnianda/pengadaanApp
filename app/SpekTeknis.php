<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpekTeknis extends Model
{
    //
    protected $fillable=['paket_id','nama_item','volume','satuan','harga','spesifikasi','keterangan','jumlah'];
}
