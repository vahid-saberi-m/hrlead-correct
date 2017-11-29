<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv_folder extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
        'job_post_id',
        'company_id'
    ];

    public function users(){
        return $this->belongsToMany('App\Models\user', 'cv_folder_user' );
    }
    public function job_post(){
        return $this->belongsTo('App\job_post');
    }
    public function company(){
        return $this->belongsTo('App\company');
    }
}
