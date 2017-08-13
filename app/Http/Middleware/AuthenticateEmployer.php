<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Auth\Middleware\Authenticate;

class AuthenticateEmployer extends Authenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($guards);

        return $next($request);
    }

    protected function authenticate(array $guards)
    {
        if(is_null($user = $this->auth->user()) || $user->user_type != 'EMP')
        {
            throw new AuthenticationException();
        }

        parent::authenticate($guards);
    }
}
