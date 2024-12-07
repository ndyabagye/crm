<?php

declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web/routes.php',
        commands: __DIR__ . '/../routes/console/routes.php',
        health: '/up',
    )
    ->withMiddleware(
        callback: function (Middleware $middleware): void {
            $middleware->web(append: [
                App\Http\Middleware\HandleInertiaRequests::class,
                Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
            ]);

        })
    ->withExceptions(
        using: function (Exceptions $exceptions): void {
        })->create();
