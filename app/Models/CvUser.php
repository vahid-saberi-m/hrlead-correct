<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvUser extends Model
{
    protected $table = 'cv_ids';
    protected $fillable = ['candidate_id','cv'];

}
