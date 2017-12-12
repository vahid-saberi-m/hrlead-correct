<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Application extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'candidate_id',
        'job_post_id',
        'is_seen',
        'status',
        'cv_id'
    ];

    public function Candidate(){
        return $this->belongsTo('App\Models\Candidate');
    }
    public function JobPost(){
        return $this->belongsTo('App\Models\JobPost');
    }
    public function CvUser(){
        return $this->belongsTo('App\Models\CvUser');
    }
    protected $dates = ['deleted_at'];
}
