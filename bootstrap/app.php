<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Mockery\Exception\InvalidOrderException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->render(function (InvalidOrderException $e, Request $request) {
        //     return response()->view('errors.404', status: 404);
        // });
        if ($exceptions instanceof InvalidOrderException) {
            return response()->view('errors.401', status: 401);
        }
        if ($exceptions instanceof InvalidOrderException) {
            return response()->view('errors.403', status: 403);
        }
        if ($exceptions instanceof InvalidOrderException) {
            return response()->view('errors.404', status: 404);
        }
        if ($exceptions instanceof InvalidOrderException) {
            return response()->view('errors.500', status: 500);
        }
    })->create();
