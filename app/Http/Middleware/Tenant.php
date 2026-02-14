<?php

namespace App\Http\Middleware;

use App\Enums\SubscriptionStatusEnum;
use App\Enums\TenantStatusEnum;
use App\Models\Tenant as ModelsTenant;
use App\Services\SubscriptionChecker;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Uri;
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
        if ($tenant) {
            $subscription = new SubscriptionChecker();
            $subscription->hasActiveSubscription($tenant);
            app()->instance('tenant', $tenant);
            return $next($request);
        }
        if ($host == Uri::of(env('APP_URL'))->host()) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
