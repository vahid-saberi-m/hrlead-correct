<?php

namespace App\Models;

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
        return $this->belongsTo('App\Models\Candidate');
    }
    public function JobPost(){
        return $this->belongsTo('App\Models\JobPost');
    }
    public function CvUser(){
        return $this->belongsTo('App\Models\CvUser');
    }
}
