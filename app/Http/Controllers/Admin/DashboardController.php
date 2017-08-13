<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
    	$model=User::paginate(3);
    	$columns=User::$columns;
        return view('admin.dashboard',compact('model','columns'));
    }
    public function show(User $users)
    {
    	return response($users);
    }
}
