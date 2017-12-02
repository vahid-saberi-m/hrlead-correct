<?php

namespace App\Models;

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
        'company_id', 'name', 'email', 'password', 'role', 'position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cv_folders()
    {
        return $this->belongsToMany('App\Models\CvFolder', 'cv_folder_user');
    }

    public function job_posts()
    {
        return $this->hasMany('App\Models\JobPost');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }





}

