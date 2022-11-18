<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

use Auth;
class Handler extends ExceptionHandler
{
   
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/admin');
        }
        if ($request->is('company') || $request->is('company/*')) {
            return redirect()->guest('/company');
        }
        if ($request->is('staff') || $request->is('staff/*')) {
            return redirect()->guest('/staff');
        }

        return redirect()->guest(route('login'));
    }
}
