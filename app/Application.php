<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $fillable = [
        'candidate_id',
        'job_post_id',
        'is_seen',
        'status',
        'cv_id'
    ];

    public function candidate(){
        return $this->belongsTo('App\candidate');
    }
    public function job_post(){
        return $this->belongsTo('App\job_post');
    }
    public function cv_id(){
        return $this->belongsTo('App\cv_id');
    }
}
