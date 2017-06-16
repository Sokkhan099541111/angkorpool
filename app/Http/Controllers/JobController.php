<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\JobIndustry;
use App\JobType;
use App\JobOpeningStatus;

class JobController extends Controller
{
	public function index()
	{
		$jobs = Job::where('user_id', auth()->user()->id)
					->latest()
					->get();

		return view('job', compact('jobs'));
	}

    public function create()
    {
        $industries = JobIndustry::all();
        $job_types = JobType::all();
        $job_opening_statuses = JobOpeningStatus::all();

    	return view('job-create', compact('industries', 'job_types', 'job_opening_statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'industry' => 'required',
            'job-opening-status' => 'required',
            'job-type' => 'required',
            'closing-date' => 'required|date|after:today',
        ]);

        Job::create([
            'emp_id' => auth()->user()->id,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            //'published_date' => $request->get('title'),
            'closing_date' => $request->get('closing-date'),
            'industry_id' => $request->get('industry'),
            'salary' => $request->get('salary'),
            'status' => $request->get('job-opening-status'),
            'city' => $request->get('city'),
            'province' => $request->get('location'),
            'work_experience' => $request->get('work-experience'),
            'job_type_id' => $request->get('job-type'),
            'number_of_positions' => $request->get('number-of-position'),
        ]);
    }

    public function show($id)
    {
        $job = Job::with('type')->find($id);

        return view('job-show', compact('job'));
    }
}
