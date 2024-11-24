<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


class Handler extends ExceptionHandler
{
    public function register()
    {
        $this->renderable(function (Exception $e) {
            if ($e->getPrevious() instanceof TokenMismatchException) {
                return redirect()->route('index');
            }
            if ($e instanceof RouteNotFoundException) {
                return response()->view('errors.404', [], 404);
            }

            if ($e instanceof InternalErrorException) {
                return response()->view('errors.500', [], 500);
            }

        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return redirect()->route('index');
    }
}
