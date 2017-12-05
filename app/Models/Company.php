<?php

namespace App\Models;

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
    public function Users(){
        return $this->hasMany('App\Models\User');
    }
    public function JobPosts(){
        return $this->hasMany('App\Models\JobPost', 'company_id');
    }
}
