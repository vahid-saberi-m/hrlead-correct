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
        'cv_id',
        'cv_folder_id'

    ];
    public function CvFolder(){
        return $this->belongsTo('App\Models\CvFolder', 'cv_folder_id');
    }
    public function Candidate(){
        return $this->belongsTo('App\Models\Candidate', 'candidate_id');
    }
    public function JobPost(){
        return $this->belongsTo('App\Models\JobPost','job_post_id');
    }
    public function CvUser(){
        return $this->belongsTo('App\Models\CvUser');
    }
    protected $dates = ['deleted_at'];
}
