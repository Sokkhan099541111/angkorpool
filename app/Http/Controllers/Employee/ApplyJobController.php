<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;

class ApplyJobController extends Controller
{
    public function index()
    {
        $jobs = employee()->jobs()->get();

        return view('employee.applied-jobs', compact('jobs'));
    }

    public function save(Job $job)
    {
        employee()->jobs()->attach($job->id);

        return redirect()->route('employee.applied.jobs');
    }
}
