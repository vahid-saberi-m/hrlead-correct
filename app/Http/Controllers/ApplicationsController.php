<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobPost;
use App\Models\Candidate;
use App\Models\CvFolder;
use Illuminate\Http\Request;


class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JobPost $jobpost, Candidate $candidate)
    {
        $cvfolder = CvFolder::where('job_post_id'== $jobpost->id)->where('name'=='در صف انتظار')->first();
        $application = Application::create([
            'candidate_id'=> $candidate->id ,
            'job_post_id'=> $jobpost->id,
            'is_seen'=> '0',
            'status'=> 'در صف انتظار',
            'cv_id'=>'1',
            'cv_folder_id'=> $cvfolder->id,
        ]);
        return redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function showApplication(Application $application)
    {
//        dd($application->candidate_id);
        $candidate= $application->Candidate;
        $cvfolder= $application->CvFolder;
//        $cvfolders= $cvfolder->JobPost->CvFolders;
        $applications= $cvfolder->Applications;
        return view('public.applications',[
            'application'=>$application,
            'candidate'=>$candidate,
            'cvfolder'=>$cvfolder,
//            'cvfolders'=>$cvfolders,
            'applications'=>$applications,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */

    public function changeCvFolder(application $application, cvfolder $cvfolder)
    {
        if ($application->JobPost->id==$cvfolder->JobPost->id) {
            $newcvfolder = Application::where('id', $application->id)->update([
                'cv_folder_id' => $cvfolder->id,
            ]);
            if ($newcvfolder) {
                return 'success';
            }
        } else { return 'failure';}
    }


    public function destroy(Application $application)
    {
        //
    }
}
