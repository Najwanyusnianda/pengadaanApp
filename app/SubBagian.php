<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubBagian extends Model
{
    //
    protected $primaryKey = 'kode_bagian';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
