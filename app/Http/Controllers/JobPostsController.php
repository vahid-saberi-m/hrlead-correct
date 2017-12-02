<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JobPostsController extends Controller
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
            $JobPosts = JobPost::where('user_id', Auth::user()->id)->get();
            return view('JobPosts.index', ['JobPosts' => $JobPosts]);
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
        return view('JobPosts.create', ['company_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::check()){
            $JobPost = JobPost::create([
                'title'=> $request->input('job_post_title'),
                'location'=> $request->input('location'),
                'summary'=> $request->input('summary'),
                'description'=> $request->input('description'),
                'requirements'=> $request->input('requirements'),
                'benefits'=> $request->input('benefits'),
                'publish_date'=> $request->input('publish_date'),
                'expiration_date'=> $request->input('expiration_date'),
                'approval'=> '0',
                'user_id'=> auth()->user()->id,
                'company_id'=> auth()->user()->company_id,
            ]);
            if($JobPost){
                return redirect()->route('JobPosts.show', ['JobPost'=> $JobPost->id])
                    ->with('success',' صفحه شرکت با موفقیت ساخته شد.');
            }
        }
        return back()->withInput()->with('error', 'خطایی در ثبت شرکت شما به وجود آمد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPost  $JobPost
     * @return \Illuminate\Http\Response
     */
    public function show(JobPost $JobPost)
    {
        //
        if (Auth::check()) {
            $JobPost = JobPost::find($JobPost->id);
            $cvFolders = $JobPost->cv_folders;

            return view('JobPosts.show', [
                'JobPost' => $JobPost,
                'cvFolders' => $cvFolders
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPost  $JobPost
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPost $JobPost)
    {
        //
        if (Auth::check()){

            $JobPost = JobPost::find($JobPost ->id);
            return view('JobPosts.edit',['JobPost'=>$JobPost] );
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPost  $JobPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPost $JobPost)
    {
        //save
        $JobPostUpdate = JobPost::where('id' , $JobPost->id )->update([
            'name'=> $request->input('name'),
            'JobPost_size'=> $request->input('JobPost_size'),
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
        if ($JobPostUpdate){
            return redirect() ->route('JobPosts.show', ['JobPost'=> $JobPost ->id])
                ->with('success','اطلاعات صفحه اصلی سایت استخدامی شما با موفقیت به روز رسانی شد. ' ) ;
        }
        //redirect
        return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPost  $JobPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPost $JobPost)
    {
        //
        $findJobPost = JobPost::find($JobPost->id);
        if ($findJobPost->delete()){
            //redirect
            return redirect()->route('JobPosts.index');
            with('success', 'سایت استخدامی شما پاک شد');
        }
        return back()->withInput()->with('error','سیستم موفق به پاک کردن سایت استخدامی شما نشد');

    }
}
