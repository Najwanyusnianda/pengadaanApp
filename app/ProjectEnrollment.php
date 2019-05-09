<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectEnrollment extends Model
{
    protected $fillable=['project_id','person_id','id_role','jabatan_id'];
}
