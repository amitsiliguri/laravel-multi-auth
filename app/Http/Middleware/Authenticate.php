<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
    protected function redirectToAdmin($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }
    protected function unauthenticated($request, array $guards)
    {
        switch ($guards[0]) {
            case 'admin':
                throw new AuthenticationException(
                    'Unauthenticated.', $guards, $this->redirectToAdmin($request)
                );
                break;
            default:
                throw new AuthenticationException(
                    'Unauthenticated.', $guards, $this->redirectTo($request)
                );
                break;
        }
        
    }
}
