<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\CvUser;
use App\Models\CvFolder;
use App\Models\JobPost;
use Illuminate\Http\Request;

class CandidatesController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JobPost $jobpost)
    {
        $candidate = Candidate::create([
            'phone'=> $request->input('phone'),
            'email'=> $request->input('email'),
            'name'=> $request->input('name'),
            'CV'=> $request->input('cv'),
            'company'=> $request->input('company'),
            'position'=> $request->input('position'),
            'experience'=> $request->input('experience'),
            'education'=> $request->input('education'),
            'degree'=> $request->input('degree'),
            'university'=> $request->input('university'),

        ]);
        $cvfolder = CvFolder::where('job_post_id', '=', $jobpost->id)->get()->first();
        dd($cvfolder->id);

        if ($candidate){
            $cv_id= CvUser::create([
                'candidate_id'=>$candidate->id,
                'cv'=>$candidate->CV,
            ]);

            $application= Application::create([
                'candidate_id'=> $candidate->id ,
                'job_post_id'=> $jobpost->id ,
                'is_seen'=> '0',
                'status'=> 'در صف انتظار',
                'cv_id'=>$cv_id->id,
                'cv_folder_id'=> $cvfolder->id,

            ]);
            return back();

        } ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
