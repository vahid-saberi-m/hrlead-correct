<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CvFolder extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'user_id',
        'job_post_id',
        'company_id'
    ];

    public function Users(){
        return $this->belongsToMany('App\Models\User', 'cv_folder_user' );
    }
    public function JobPost(){
        return $this->belongsTo('App\Models\JobPost');
    }
    public function Company(){
        return $this->belongsTo('App\Models\Company');
    }
    public function Application(){
        return $this->hasMany('App\Models\Application','cv_folder_id');
    }
}
