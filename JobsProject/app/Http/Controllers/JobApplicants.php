<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;

class JobApplicants extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Store job applicants
    public function store(Request $request)
    {
        $job = new Apply();
        $job->user_id=$request->user_id;
        $job->job_id=$request->job_id;
        $job->current_salary=$request->current_salary;
        $job->expected_salary=$request->expected_salary;
        //CV upload
        if($request->hasFile('cv')){
            $compliteFileName = $request->file('cv')->getClientOriginalName();
            $filaNameOnly = pathinfo($compliteFileName , PATHINFO_FILENAME);
            $extension = $request->file('cv')->getClientOriginalExtension();
            $comPic = str_replace(' ' , '_' , $filaNameOnly).'-'.rand() . '_'.time(). '.'.$extension;
            $path = $request->file('cv')->storeAs('public/cvs' , $comPic);
            $job->cv=$comPic;
        }
        $job->save();
        return response(["You have applied successfully",$comPic]);
    }

}


