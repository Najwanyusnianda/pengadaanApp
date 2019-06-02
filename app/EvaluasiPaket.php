<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluasiPaket extends Model
{
    //
    protected $fillable=['id_paket','id_kriteria','status_evaluasi','hasil_evaluasi'];
}
