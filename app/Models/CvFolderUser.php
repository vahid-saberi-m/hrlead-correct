<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvFolderUser extends Model
{
    //
    protected $fillable = ['user_id','cv_folder_id', 'company_id'];

}
