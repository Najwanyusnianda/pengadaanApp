<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    //
    protected $fillable=['permintaan_id','pengirim_id','penerima_id','uraian'];

    public function permintaan()
    {
        return $this->belongsTo('App\Permintaan');
    }
}
