<?php

namespace App\Http\Middleware;

use App\Enums\Roles;
use App\Services\ExceptionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role->name != Roles::Admin) {
            ExceptionService::unauthorizedAction();
        }
        return $next($request);
    }
}
