<?php

namespace App\Models;

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

    public function Applications(){
        return $this->hasMany('App\Models\Application');
    }
}
