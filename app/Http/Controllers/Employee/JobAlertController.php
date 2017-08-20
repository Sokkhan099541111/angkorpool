<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobIndustry;
use App\JobType;
use App\Province;

class JobAlertController extends Controller
{
    public function index()
    {
        return view('employee.job-alert', [
            'alerts' => employee()->jobAlerts()->with(['job_type', 'industry'])->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        $industries = JobIndustry::all();
        $job_types = JobType::all();
        $provinces = Province::all();

        return view('employee.job-alert-create', compact('industries', 'job_types', 'provinces'));
    }

    public function save(Request $request)
    {
        employee()->jobAlerts()->create($request->all());

        return redirect()->route('job.alert');
    }

    public function delete($id)
    {
        employee()->jobAlerts()->find($id)->delete();

        return redirect()->back();
    }
}
