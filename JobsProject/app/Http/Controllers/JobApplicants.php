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
    public function store(Request $request)
    {
        $job = new Apply();
        $job->user_id=$request->user_id;
        $job->job_id=$request->job_id;
        $job->save();
        return response("You have applied successfully");
    }
}
