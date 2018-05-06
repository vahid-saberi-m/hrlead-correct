<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobPost;
use App\Models\CvFolder;
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
            $jobposts = JobPost::where('user_id', Auth::user()->id)->get();
            return view('JobPosts.index', ['JobPosts' => $jobposts]);
        }
    }

    public function indexApproved()
    {
        $company = auth()->user()->company;
        $jobposts = $company->JobPosts->where('approval', '=', 1);
        $user = auth()->user();
        return view('JobPosts.admin.ApprovedJobPosts',
            [
                'jobposts' => $jobposts,
            ]);
    }


    public function indexWaiting()
    {
        //
        $company = auth()->user()->company;
        $jobposts = $company->JobPosts->where('approval', '!=', 1);
        return view('JobPosts.admin.WaitingJobPosts',
            [
                'jobposts' => $jobposts,
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = auth()->user()->company;
        $id = auth()->user()->company->id;
        $jobposts = $company->JobPosts;
        $user = auth()->user();
        return view('JobPosts.create', [
            'company_id' => $id,
            'jobposts' => $jobposts,
            'user' => $user,
            'company' => $company,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::check()) {
            $jobpost = JobPost::create([
                'title' => $request->input('job_post_title'),
                'location' => $request->input('location'),
                'summary' => $request->input('summary'),
                'description' => $request->input('description'),
                'requirements' => $request->input('requirements'),
                'benefits' => $request->input('benefits'),
                'publish_date' => $request->input('publish_date'),
                'expiration_date' => $request->input('expiration_date'),
                'approval' => '0',
                'user_id' => auth()->user()->id,
                'company_id' => auth()->user()->company_id,
                'is_active' => '0',
            ]);
            $company = auth()->user()->company;
            $id = auth()->user()->company->id;
            $jobposts = $company->JobPosts;
            $user = auth()->user();
            if ($jobpost) {
                $cv_folder1 = CvFolder::create([
                    'name' => 'رد شده',
                    'user_id' => auth()->user()->id,
                    'job_post_id' => $jobpost->id,
                    'company_id' => $id,

                ]);
                $cv_folder2 = CvFolder::create([
                    'name' => 'در صف انتظار',
                    'user_id' => auth()->user()->id,
                    'job_post_id' => $jobpost->id,
                    'company_id' => $id,

                ]);
                $cv_folder3 = CvFolder::create([
                    'name' => 'قابل تامل',
                    'user_id' => auth()->user()->id,
                    'job_post_id' => $jobpost->id,
                    'company_id' => $id,

                ]);
                $cv_folder4 = CvFolder::create([
                    'name' => 'دعوت به مصاحبه',
                    'user_id' => auth()->user()->id,
                    'job_post_id' => $jobpost->id,
                    'company_id' => $id,

                ]);
                if ($cv_folder1 && $cv_folder2 && $cv_folder3 && $cv_folder4) {
                    return view('JobPosts.questions', [
                        'jobpost'=>$jobpost
                    ]);                }
            }
        }
        return view('JobPosts.questions', [
            'jobpost'=>$jobpost
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPost $jobpost
     * @return \Illuminate\Http\Response
     */
    public function show(JobPost $jobpost)
    {
        if (Auth::check()) {

            $cvfolders = $jobpost->CvFolders;
            $applications = $jobpost->Applications;
            if ($applications) {
                return view('JobPosts.show', [
                    'jobpost' => $jobpost,
                    'cvfolders' => $cvfolders,
                    'applications' => $applications,
                ]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPost $jobpost
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPost $jobpost)
    {
            return view('JobPosts.edit', [
                'jobpost' => $jobpost,
            ]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\JobPost $jobpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPost $jobpost)
    {
        //save
        $jobpostUpdate = JobPost::where('id', $jobpost->id)->update([
            'title' => $request->input('title'),
            'location' => $request->input('location'),
            'summary' => $request->input('summary'),
            'description' => $request->input('description'),
            'requirements' => $request->input('requirements'),
            'benefits' => $request->input('benefits'),
            'publish_date' => $request->input('publish_date'),
            'expiration_date' => $request->input('expiration_date'),

        ]);
        if ($jobpostUpdate) {
            $user = auth()->user();
            $jobposts = auth()->user()->JobPosts;
            $jobpost = JobPost::find($jobpost->id);
            $company = $jobpost->company;
            $cvfolders = $jobpost->CvFolders;
            $applications = Application::where('job_post_id', '=', $jobpost->id);
            return view('JobPosts.show', [
                'jobpost' => $jobpost,
                'jobposts' => $jobposts,
                'company' => $company,
                'user' => $user,
                'cvfolders' => $cvfolders,
                'applications' => $applications,

            ])
                ->with('success', 'اطلاعات صفحه اصلی سایت استخدامی شما با موفقیت به روز رسانی شد. ');
        }
        //redirect
        return back()->withInput();

    }

    public function approval(Request $request, JobPost $jobpost)
    {
        $approved = $jobpost->update([
            'approval' => $request->input('approval')
        ]);

        if ($approved) {
            $jobposts = auth()->user()->JobPosts->where('approvel','!=',1);
            return view('/JobPosts/admin/WaitingJobPosts', [
                'jobposts' => $jobposts,
            ]);
        } else {
            var_dump($jobpost->id);
        }


    }

    public function delete(Request $request, JobPost $jobpost)
    {
        $jobpost->Delete();

            $jobposts = auth()->user()->JobPosts;
            return view('/JobPosts/admin/WaitingJobPosts', [
                'jobposts' => $jobposts,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPost $jobpost
     * @return \Illuminate\Http\Response
     */
    public function expire(JobPost $jobpost)
    {
            $jobpost->update([
            'is_active' => 0
        ]);
            $jobposts = auth()->user()->JobPosts->where('approval','=',1);
            return view('/JobPosts/admin/ApprovedJobPosts', [
                'jobposts' => $jobposts,
            ]);

    }

    public function reactive(Request $request, JobPost $jobpost)
    {
        //save
        $expired = JobPost::where('id', $jobpost->id)->update([
            'expiration_date' => $request->input('expiration_date'),
            'is_active' => '1'
        ]);

        if ($expired) {
            $user = auth()->user();
            $jobposts = auth()->user()->JobPosts;
            $company = auth()->user()->company;
            return view('/JobPosts/admin/ApprovedJobPosts', [
                'jobposts' => $jobposts,
                'company' => $company,
                'user' => $user,
            ]);
        } else {
            var_dump($jobpost->id);
        }


    }

    public function destroy(JobPost $jobpost)
    {
        //
        $findJobPost = JobPost::find($jobpost->id);
        if ($findJobPost->delete()) {
            //redirect
            return redirect()->route('JobPosts.index');
            with('success', 'سایت استخدامی شما پاک شد');
        }
        return back()->withInput()->with('error', 'سیستم موفق به پاک کردن سایت استخدامی شما نشد');

    }
}
