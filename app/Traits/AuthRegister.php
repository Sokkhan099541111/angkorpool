<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\User;

trait AuthRegister
{
    protected function validateInput(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'same:password',
            'user_type' => 'required',
        ], [
            'required' => 'Field is required.',
            'user_type.required' => 'Please tell us who you are.',
        ]);
    }

    protected function register(Request $request)
    {
        $user = User::create($request->only('email', 'password', 'user_type'));

        if($request->user_type === 'EMP')
        {
            $user->employer()->create($request->only('email'));
        }
        else
        {
            $user->employee()->create($request->only('email'));
        }

        return $user;
    }
}