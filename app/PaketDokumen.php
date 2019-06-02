<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketDokumen extends Model
{
    //
    protected $fillable=['paket_id','subject','type','document_file','scanned_file','html_file'];
}
