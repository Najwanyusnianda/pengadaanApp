<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    //
    protected $fillable=['nama_bagian','judul','nomor_form',
    'kode_kegiatan','output','komponen','sub_komponen','grup_akun',
    'nilai','date_mulai','date_selesai','date_created_form','disposisi_status','is_dikerjakan'];

    public function Person()
    {
        return $this->hasOne('App\Disposisi');
    }
}


