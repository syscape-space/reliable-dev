<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\UserJob;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function getAllJobs()
    {
        $jobs = Career::get();

        return response()->json([
            "jobs" => $jobs
        ], 200);
    }
    public function getThisJobDetails($id){
        $jobDetails = Career::find($id);
        return response()->json([
            "jobDetails" => $jobDetails
        ], 200);
    }
}
