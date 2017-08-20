<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Employee;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Employee::paginate(20);

        return view('admin.applicant.all', compact('applicants'));
    }

    public function show(Employee $applicant)
    {
        return view('admin.applicant.show', compact('applicant'));
    }

    public function create()
    {
        return view('admin.applicant.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:applicants',
            'guard_name' => 'required',
        ]);

        Employee::create($request->all());

        return redirect()->route('admin.applicants');
    }

    public function edit(Employee $applicant)
    {
        return view('admin.applicant.edit', compact('applicant'));
    }

    public function update(Request $request, Employee $applicant)
    {
        $this->validate($request, [
            'surname' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
        ]);

        $applicant->update($request->except('email'));

        return redirect()->route('admin.applicants');
    }

    public function delete(Employee $applicant)
    {
        $applicant->delete();

        return redirect()->back();
    }
}