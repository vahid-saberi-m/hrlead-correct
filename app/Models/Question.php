<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company_id',
        'job_post_id',
        'question',
    ];
    public function JobPost()
    {
        return $this->belongsTo('App\Models\JobPost','job_post_id');
    }
    public function Answers()
    {
        return $this->hasMany('App\Models\Answers');
    }
}
