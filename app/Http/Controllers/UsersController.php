<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = auth()->user()->Company;
        $user = auth()->user();
        $jobposts = auth()->user()->JobPosts;
        $companyusers = $company->Users;
            return view('users.index', [
                'user'=> $user,
                'companyusers'=> $companyusers,
                'company'=>$company,
                'jobposts'=> $jobposts
            ]);


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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $id = auth()->user()->id;
        if ($id == $user->id) {
            $user = User::find($user->id);
            $jobposts = $user->JobPosts;
            $company = $user->Company;

//            return view('admin.show',['user'=>$user] );


            return view('users.show', ['user' => $user,
                'jobposts' => $jobposts,
                'company' => $company,
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }
    public function approved(Request $request, User $user)
    {
        //save
        $approved = User::where('id',$user->id)-> update([
            'is_approved'=> $request->input('approved')
        ]);

        if($approved)
        {     $user = auth()->user();
            $jobposts = auth()->user()->JobPosts;
            $company = auth()->user()->company;
            $companyusers = $company->Users;
            return view('/Users/index',[
            'companyusers'=> $companyusers,
                'jobposts' => $jobposts,
                'company' => $company,
                'user' => $user,
            ]);
        } else{
            var_dump($user->id);
        }


    }

    public function rejected(Request $request, User $user)
    { $rejected = User::find($user->id);
        $rejected->Delete();

        if($rejected)
        {     $user = auth()->user();
            $jobposts = auth()->user()->JobPosts;
            $company = auth()->user()->company;
            $companyusers = $company->Users;
            return view('/Users/index',[
            'companyusers'=> $companyusers,
                'jobposts' => $jobposts,
                'company' => $company,
                'user' => $user,
            ]);
        } else{
            var_dump($user->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
