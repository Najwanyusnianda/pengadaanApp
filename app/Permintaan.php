<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    //
    protected $fillable=['kode_bagian','judul','nomor_form',
    'kode_kegiatan','output','komponen','sub_komponen','grup_akun','jenis_pengadaan',
    'nilai','date_mulai','date_selesai','date_created_form','disposisi_status','is_dikerjakan'];

    public function Person()
    {
        return $this->hasOne('App\Disposisi');
    }
}


