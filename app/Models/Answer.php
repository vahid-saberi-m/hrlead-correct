<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Answer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'question_id',
        'answer',
        'value',
    ];
    public function Questions()
    {
        return $this->belongsTo('App\Models\Question','question_id');
    }
}
