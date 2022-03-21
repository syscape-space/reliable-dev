<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use App\Models\Career;
use App\Models\CareerRequest;
use App\Models\UserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function makeApply(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|max:11|numeric',
            'country' => 'required',
            'attached_url' => 'required',
        ]);

        // $imageName =  time() . '_' . $request->file('attached_url')->getClientOriginalName();
        $file_name = time().'_'.$request->file->getClientOriginalName();
        $file_path = $request->file('file')->storeAs('uploads', $file_name );
        
        $request->file->move(public_path('applied_job'), $file_name);

        $newCareer = new CareerRequest();
        $newCareer->name = $request->name ;
        $newCareer->email = $request->email ;
        $newCareer->mobile = $request->mobile ;
        $newCareer->country  = $request->country ;
        $newCareer->attached_url = $file_name ;

        $newCareer->save();

        return response()->json([
            "appliedJob" => "inserted"
        ], 200);
    }
}
