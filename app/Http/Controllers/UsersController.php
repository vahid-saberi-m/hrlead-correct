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
        $admins = $company->Users->where('role', 'LIKE', 'admin');
        $companyUsers = $company->Users->where('role', '!=', 'admin')->where('is_approved', 'LIKE', '1');
        $weightingUsers = $company->Users->where('role', '!=', 'admin')->where('is_approved', '!=', '1');
        return view('users.index', [
            'admins' => $admins,
            'companyUsers' => $companyUsers,
            'weightingUsers' => $weightingUsers
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
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
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = auth()->user();
        $jobposts = auth()->user()->JobPosts;
        $company = auth()->user()->Company;
        return view('users.edit', [
            'jobposts' => $jobposts,
            'company' => $company,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function approval(Request $request, User $user)
    {
        $approval = $request->approval;
        if ($approval == 1) {
            $approved = User::where('id', $user->id)->update([
                'is_approved' => $approval
            ]);
            }
        if ($approval==0){
            $rejected = User::find($user->id);
            $rejected->Delete();

        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
