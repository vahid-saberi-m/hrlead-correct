<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'company_id',
        'title',
        'content',
        'main_photo',
        'tags',
    ];
    public function Company()
    {
        return $this->belongsTo('App\Models\Company','company_id');
    }
    public function EventPictures()
    {
        return $this->hasMany('App\Models\EventPicture');
    }
}
