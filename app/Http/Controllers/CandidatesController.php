<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\CvUser;
use App\Models\CvFolder;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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


    public function checkEmail(Request $request, JobPost $jobpost)
    {
        $exists = Candidate::where('email', 'LIKE', $request->input('email'))->first();
        if ($exists) {
            $applied = $exists->Applications->where('job_post_id', '=', $jobpost->id)->first();
            if ($applied) {
                return view('public.alreadyApplied',[
                    "jobpost"=> $jobpost
                ]);
            } else {
                $candidate= $exists;
                return view('public.candidateExist',[
                    "jobpost"=> $jobpost,
                    "candidate"=>$candidate,
                ]);
            }
        }
        if (!$exists){
                $email= $request->input('email');
            return view('public.candidateNew',[
                "jobpost"=> $jobpost,
                "email"=>$email
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function newApply(Request $request, JobPost $jobpost )
    {
//        $path = $request->file('cv')->store('CVs');

        $candidate = Candidate::create([
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'CV' => 1,
            'company' => $request->input('company'),
            'position' => $request->input('position'),
            'experience' => $request->input('experience'),
            'education' => $request->input('education'),
            'degree' => $request->input('degree'),
            'university' => $request->input('university'),

        ]);
        if ($candidate) {
            $cvfolder = CvFolder::where('job_post_id', '=', $jobpost->id)->where('name', 'Like', 'در صف انتظار')->get()->first();

            $cv_id = CvUser::create([
                'candidate_id' => $candidate->id,
                'cv' => 1,
            ]);
            Application::create([
                'candidate_id' => $candidate->id,
                'job_post_id' => $jobpost->id,
                'is_seen' => '0',
                'status' => 'در صف انتظار',
                'cv_id' => $cv_id->id,
                'cv_folder_id' => $cvfolder->id,

            ]);
        }

//        $candidatename = $request->input('name');
//        $data= [
//            'name'=>$candidatename ,
//            'company'=>$jobpost->Company->name,
//            'position'=>$jobpost->title,
//
//
//        ];
//        $candidateemail = $request->input('email');
//        Mail::send('email.applicationSuccessful',$data,function ($message) use($candidateemail,$jobpost) {
//            $message->to("$candidateemail" , $jobpost->user->name)->subject('درخواست همکاری شما با موفیت ثبت شد');
//        });
        return view('public.applicationSuccessful');
    }
    public function existApply(Request $request, JobPost $jobpost, Candidate $candidate)
    {
//            $path = $request->file('cv')->store('CVs');
            $success = $candidate->update([
                'phone' => $request->input('phone'),
                'name' => $request->input('name'),
                'CV' => 1,
                'company' => $request->input('company'),
                'position' => $request->input('position'),
                'experience' => $request->input('experience'),
                'education' => $request->input('education'),
                'degree' => $request->input('degree'),
                'university' => $request->input('university'),
            ]);
                $cvfolder = $jobpost->CvFolders->where('name', 'Like', 'در صف انتظار')->first();
//                $cv_id = CvUser::create([
//                    'candidate_id' => $candidate->id,
//                    'cv' => 1,
//                ]);
                Application::create([
                    'candidate_id' => $candidate->id,
                    'job_post_id' => $jobpost->id,
                    'is_seen' => '0',
                    'status' => 'در صف انتظار',
                    'cv_id' => 1,
                    'cv_folder_id' => $cvfolder->id,
                ]);



            return view('public.applicationSuccessful');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
