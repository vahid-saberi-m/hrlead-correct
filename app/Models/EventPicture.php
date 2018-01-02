<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPicture extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company_id',
        'event_id',
        'path',
    ];
    public function Event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}
