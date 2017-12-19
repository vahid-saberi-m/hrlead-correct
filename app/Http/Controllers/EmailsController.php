<?php

namespace App\Http\Controllers;

use App\Http\Middleware\jobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function sendEmail(candidate $candidate, jobPost $jobPost){
        $company= $jobPost->Company;
        $name= $candidate->name;
        $email= $candidate->email;
        $job= $jobPost->title;
        $data= [
            'title'=>$company,
            'content'=>'this is sent by hrlead',

        ];
        Mail::send('email.test',$data,function ($message){
            $message->to('saberi1365@gmail.com', 'vahid')->subject('hello vahid');
        });
        return back();
    }

}
