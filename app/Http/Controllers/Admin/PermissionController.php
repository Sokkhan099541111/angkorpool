<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(20);

        return view('admin.permission.all', compact('permissions'));
    }

    public function show(Permission $permission)
    {
        return view('admin.permission.show', compact('permission'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions',
            'guard_name' => 'required',
        ]);

        Permission::create($request->only('name', 'guard_name'));

        return redirect()->route('admin.permissions');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('permissions')->ignore($permission->id),
            ],
            'guard_name' => 'required',
        ]);

        $permission->update($request->only('name', 'guard_name'));

        return redirect()->route('admin.permissions');
    }

    public function delete(Permission $permission)
    {
        $permission->delete();

        return redirect()->back();
    }
}
