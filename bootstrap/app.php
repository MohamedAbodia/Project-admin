<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\PermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register your custom middleware here
            // Other middleware
            $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);     
        $middleware->alias([
        'permission' => \App\Http\Middleware\PermissionMiddleware::class,
            ]);     
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


