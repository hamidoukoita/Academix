<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;

return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function () {
        return [
            HandlePrecognitiveRequests::class,
            RoleMiddleware::class, // 👈 ton middleware personnalisé ici
        ];
    })
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->create();

