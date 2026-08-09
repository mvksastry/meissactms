<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\TrimAndNullStrings;

use Illuminate\Session\TokenMismatchException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class
        ]);
        // Global middleware
        $middleware->append(TrimAndNullStrings::class);
        // Add redirect for authenticated users
        $middleware->web([
            \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Illuminate\Session\TokenMismatchException $e, $request) {
        return redirect()->route('login')
            ->with('message', 'Your session expired, please log in again.');
        });
        //
    })->create();
