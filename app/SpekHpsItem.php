<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpekHpsItem extends Model
{
    //
    protected $fillable=['spek_id','paket_id','nama_item','volume','satuan','harga','jumlah'];
}
