<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
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
    public function Events()
    {
        return $this->hasMany('App\Models\Event');
    }
}
