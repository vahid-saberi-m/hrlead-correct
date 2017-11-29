<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $fillable = [
        'phone',
        'email',
        'name',
        'CV',
        'company',
        'position',
        'experience',
        'education',
        'degree',
        'university'

    ];

    public function applications(){
        return $this->hasMany('App\application');
    }
}
