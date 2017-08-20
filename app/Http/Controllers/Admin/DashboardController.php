<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
    	$model = User::paginate(20);

        return view('admin.dashboard',compact('model'));
    }
    public function show(User $users)
    {
    	return response($users);
    }
}
