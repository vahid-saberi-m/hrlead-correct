<?php

namespace App\Http\Controllers;

use App\Job_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Job_postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            $job_posts = Job_post::where('user_id', Auth::user()->id)->get();
            return view('job_posts.index', ['job_posts' => $job_posts]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        //
        return view('job_posts.create', ['company_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Job_post $request)
    {
        //
        if (Auth::check()){
            $job_post = Job_post::create([
                'title'=> $request->input('job_post_title'),
                'location'=> $request->input('location'),
                'summary'=> $request->input('summary'),
                'description'=> $request->input('description'),
                'requirements'=> $request->input('requirements'),
                'benefits'=> $request->input('benefits'),
                'publish_date'=> $request->input('publish_date'),
                'expiration_date'=> $request->input('expiration_date'),
                'approval'=> 'not approved',
                'user_id'=> auth()->user()->id,
                'company_id'=> $request->input('company_id')
            ]);
            if($job_post){
                return redirect()->route('job_posts.show', ['Job_post'=> $job_post->id])
                    ->with('success',' صفحه شرکت با موفقیت ساخته شد.');
            }
        }
        return back()->withInput()->with('error', 'خطایی در ثبت شرکت شما به وجود آمد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job_post  $job_post
     * @return \Illuminate\Http\Response
     */
    public function show(Job_post $job_post)
    {
        //
        if (Auth::check()) {
            $job_post = Job_post::find($job_post->id);
            return view('job_posts.show', ['job_post' => $job_post]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job_post  $job_post
     * @return \Illuminate\Http\Response
     */
    public function edit(Job_post $job_post)
    {
        //
        if (Auth::check()){

            $job_post = Job_post::find($job_post ->id);
            return view('job_posts.edit',['Job_post'=>$job_post] );
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job_post  $job_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job_post $job_post)
    {
        //save
        $job_postUpdate = Job_post::where('id' , $job_post->id )->update([
            'name'=> $request->input('name'),
            'Job_post_size'=> $request->input('Job_post_size'),
            'slogan'=> $request->input('slogan'),
            'website'=> $request->input('website'),
            'logo'=> $request->input('logo'),
            'message_title'=> $request->input('message_title'),
            'message_content'=> $request->input('message_content'),
            'main_photo'=> $request->input('main_photo'),
            'about_us'=> $request->input('about_us'),
            'why_us'=> $request->input('why_us'),
            'recruiting_steps'=> $request->input('recruiting_steps'),
            'address'=> $request->input('address'),
            'email'=> $request->input('email'),
            'phone_number'=> $request->input('phone_number'),
            'location'=> $request->input('location'),
        ]);
        if ($job_postUpdate){
            return redirect() ->route('job_posts.show', ['Job_post'=> $job_post ->id])
                ->with('success','اطلاعات صفحه اصلی سایت استخدامی شما با موفقیت به روز رسانی شد. ' ) ;
        }
        //redirect
        return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job_post  $job_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job_post $job_post)
    {
        //
        $findJob_post = Job_post::find($job_post->id);
        if ($findJob_post->delete()){
            //redirect
            return redirect()->route('job_posts.index');
            with('success', 'سایت استخدامی شما پاک شد');
        }
        return back()->withInput()->with('error','سیستم موفق به پاک کردن سایت استخدامی شما نشد');

    }
}
