<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
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
            $company = Company::where('user_id', Auth::user()->id)->get();
            return view('companies.index', ['companies' => $company]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
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
            $company = Company::create([
                'name'=> $request->input('name'),
                'company_size'=> $request->input('company_size'),
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
                'user_id'=> auth()->user()->id
            ]);
            if($company){
                return redirect()->route('companies.show', ['company'=> $company->id])
                    ->with('success',' صفحه شرکت با موفقیت ساخته شد.');
            }
        }
        return back()->withInput()->with('error', 'خطایی در ثبت شرکت شما به وجود آمد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        if (Auth::check()) {
            $company = Company::find($company->id);
            return view('companies.show', ['company' => $company]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        if (Auth::check()){

        $company = Company::find($company ->id);
        return view('companies.edit',['company'=>$company] );
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //save
        $companyUpdate = Company::where('id' , $company->id )->update([
            'name'=> $request->input('name'),
            'company_size'=> $request->input('company_size'),
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
        if ($companyUpdate){
            return redirect() ->route('companies.show', ['company'=> $company ->id])
                ->with('success','اطلاعات صفحه اصلی سایت استخدامی شما با موفقیت به روز رسانی شد. ' ) ;
        }
        //redirect
        return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $findCompany = Company::find($company->id);
        if ($findCompany->delete()){
            //redirect
            return redirect()->route('companies.index');
                with('success', 'سایت استخدامی شما پاک شد');
        }
        return back()->withInput()->with('error','سیستم موفق به پاک کردن سایت استخدامی شما نشد');

    }
}
