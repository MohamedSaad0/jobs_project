<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;

class JobApplicants extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Apply::all();
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
        // $jobId = Apply::where('job_id','=',$request->job_id)->get();
        // if(Auth::id() === $jobId){
        //     return "User Exists";
        // }
        // $user=Auth::user()->id->first();
        // return $user;
        // $apply = Apply::where('user_id',$user)->get();
        // dd( $apply);
        $job = new Apply();
        $job->user_id=$request->user_id;
        $job->job_id=$request->job_id;
        $job->save();
        return response("You have applied successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        // if(Auth::check()){
        //     $id=Auth::id();
        //     return $id;
        // }
        // $user=Auth::user();
        // return $user;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}