<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'user_id',
        'name',
        'company_size',
        'slogan',
        'website',
        'logo',
        'message_title',
        'message_content',
        'main_photo',
        'about_us',
        'why_us',
        'recruiting_steps',
        'address',
        'email',
        'phone_number',
        'location',
    ];
    public function users(){
        return $this->hasMany('App\user');
    }
    public function job_posts(){
        return $this->hasMany('App\job_post');
    }
}
