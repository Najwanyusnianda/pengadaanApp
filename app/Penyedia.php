<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyedia extends Model
{
    //
    public $incrementing = false;
    protected $primaryKey = 'npwp';
    protected $fillable=['npwp','nama','email','telepon','alamat','nama_pimpinan','jabatan_pimpinan'];
}
