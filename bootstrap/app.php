<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(function () {
        // Get the current domain from the request
        $currentDomain = Request::getHost();
        
        // Check if the current domain is in the 'central_domains' configuration
        $centralDomains = Config::get('tenancy.central_domains', []);

        // If the current domain is in the centralized list, load the routes
        if (in_array($currentDomain, $centralDomains)) {
            // Define absolute paths to route files
            $routesPath = dirname(__DIR__) . '/routes'; // Make sure this resolves correctly

            // Check if the files exist before loading them to avoid errors
            if (file_exists($routesPath . '/web.php')) {
                Route::middleware('web')
                    ->group($routesPath . '/web.php');
            } else {
                // If the file does not exist, you can log or handle the error
                \Log::error("web.php route file not found at: " . $routesPath . '/web.php');
            }

            if (file_exists($routesPath . '/api.php')) {
                Route::prefix('api')
                    ->middleware('api')
                    ->group($routesPath . '/api.php');
            } else {
                // If the file does not exist, you can log or handle the error
                \Log::error("api.php route file not found at: " . $routesPath . '/api.php');
            }
        }
    })
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
