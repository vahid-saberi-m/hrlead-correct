<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvFolder extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
        'job_post_id',
        'company_id'
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User', 'cv_folder_user' );
    }
    public function job_post(){
        return $this->belongsTo('App\Models\JobPost');
    }
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
}
