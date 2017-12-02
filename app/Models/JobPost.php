<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $table = 'job_posts';

    protected $fillable = [
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

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
    public function cv_folders()
    {
        return $this->hasMany('App\Models\CvFolder');
    }

}
