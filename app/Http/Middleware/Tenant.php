<?php

namespace App\Http\Middleware;

use App\Enums\TenantStatusEnum;
use App\Models\Tenant as ModelsTenant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Tenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $tenant = ModelsTenant::where('domain', $host)->where('status', TenantStatusEnum::ACTIVE)->first();
        app()->instance('tenant', $tenant);
        return $next($request);
    }
}
