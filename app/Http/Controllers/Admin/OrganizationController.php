<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Employer;
use App\JobIndustry;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Employer::with('industry')->paginate(20);

        return view('admin.organization.all', compact('organizations'));
    }

    public function show(Employer $organization)
    {
        return view('admin.organization.show', compact('organization'));
    }

    public function create()
    {
        return view('admin.organization.create', compact('industries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:employers',
            'guard_name' => 'required',
        ]);

        Employer::create($request->all());

        return redirect()->route('admin.organizations');
    }

    public function edit(Employer $organization)
    {
        $industries = JobIndustry::all();

        return view('admin.organization.edit', compact('organization', 'industries'));
    }

    public function update(Request $request, Employer $organization)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required',
            'industry_id' => 'required',
        ]);

        $organization->update($request->all());

        return redirect()->route('admin.organizations');
    }

    public function delete(Employer $organization)
    {
        $organization->delete();

        return redirect()->back();
    }
}