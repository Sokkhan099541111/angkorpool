<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Employer;
use App\User;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Employer::paginate(20);

        return view('admin.organization.all', compact('organizations'));
    }

    public function show(Employer $organization)
    {
        return view('admin.organization.show', compact('organization'));
    }

    public function create()
    {
        return view('admin.organization.create');
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
        return view('admin.organization.edit', compact('organization'));
    }

    public function update(Request $request, Employer $organization)
    {
        $this->validate($request, [
            'surname' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
        ]);

        $organization->update($request->except('email'));

        return redirect()->route('admin.organizations');
    }

    public function delete(Employer $organization)
    {
        $organization->delete();

        return redirect()->back();
    }
}