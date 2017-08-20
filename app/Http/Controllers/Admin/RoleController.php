<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(20);

        return view('admin.role.all', compact('roles'));
    }

    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles',
            'guard_name' => 'required',
        ]);

        Role::create($request->only('name', 'guard_name'));

        return redirect()->route('admin.roles');
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($role->id),
            ],
            'guard_name' => 'required',
        ]);

        $role->update($request->only('name', 'guard_name'));

        return redirect()->route('admin.roles');
    }

    public function delete(Role $role)
    {
        $role->delete();

        return redirect()->back();
    }
}