<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable=['nama','deskripsi','is_active','project_storage'];
}
