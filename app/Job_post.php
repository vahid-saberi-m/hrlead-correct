<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_post extends Model
{
    //
    protected $fillable =[
        'company_id',
        'user_id',
        'title',
        'summary',
        'description',
        'requirements',
        'benefits',
        'approval',
        'location',
        'publish_date',
        'expiration_date'
        ];

    public function user(){
        return $this->belongsToMany('App\user');
    }
    public function company(){
        return $this->belongsTo('App\company');
    }

}
