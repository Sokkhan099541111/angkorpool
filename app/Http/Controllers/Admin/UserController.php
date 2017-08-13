<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = AdminUser::with('roles')->paginate(20);

        return view('admin.user.all', compact('users'));
    }

    public function delete(AdminUser $user)
    {
        $user->delete();

        return redirect()->back();
    }

    public function show(AdminUser $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->get();

        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:admin_users',
            'password' => 'required|min:8',
            'password_again' => 'same:password',
        ]);

        AdminUser::create($request->all());

        return redirect()->route('admin.users');
    }

    public function edit(AdminUser $user)
    {
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(AdminUser $user)
    {
        $this->validate($request, [
            'password' => 'required|min:8',
            'password_again' => 'same:password',
        ]);

        $user->update($request->except('username'));

        return redirect()->route('admin.users');
    }
}
