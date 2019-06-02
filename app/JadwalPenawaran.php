<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPenawaran extends Model
{
    //
    protected $fillable=['paket_id','kegiatan_penawaran_id','tanggal_pelaksanaan','waktu_mulai','waktu_selesai'];
}
