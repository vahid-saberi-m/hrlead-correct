<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobPost extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
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

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }
    public function CvFolders()
    {
        return $this->hasMany('App\Models\CvFolder');
    }
    public function Applications()
    {
        return $this->hasMany('App\Models\Application');
    }

}
