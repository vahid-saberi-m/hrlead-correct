<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\JobPost;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
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
        return view('JobPosts.questions', [
//            'jobpost'=> $jobPost
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
        $user = auth()->user();
        $jobPostId=$request->input('jobpost');
        $a1=$request->input('answer_1');
        $a2=$request->input('answer_2');
        $a3=$request->input('answer_3');
        $a4=$request->input('answer_4');
        $c1=$request->input('first');
        $c2=$request->input('second');
        $c3=$request->input('third');
        $c4=$request->input('fourth');
        $question=Question::create([
            'job_post_id' => $jobPostId,
            'company_id'=>$user->company_id,
            'question'=> $request->input('question')
        ]);
        Answer::create(['question_id'=> $question->id, 'answer'=>$a1, 'value'=> $c1]);
        if ($a2) {
            Answer::create(['question_id' => $question->id, 'answer' => $a2, 'value' => $c2]);
        }
        if ($a3) {
            Answer::create(['question_id' => $question->id, 'answer' => $a3, 'value' => $c3]);
        }
        if ($a4) {
            Answer::create(['question_id' => $question->id, 'answer' => $a4, 'value' => $c4]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
