<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id','name', 'email', 'password','role','position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function cv_folders(){
        return $this->belongsToMany('App\cv_folder','cv_folder_id');
    }
    public function job_posts(){
        return $this->belongsToMany('App\job_post');
    }

    public function company(){
        return $this->belongsTo('App\company');
    }



}

