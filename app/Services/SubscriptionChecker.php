<?php

namespace App\Services;

class SubscriptionChecker
{
    public function hasActiveSubscription($tenant)
    {
        if (!$tenant->subscription) {
            abort(402);
        }

        if ($tenant->subscription && $tenant->subscription->status == SubscriptionStatusEnum::EXPIRED) {
            abort(402);
        }

        if ($tenant->subscription && $tenant->subscription->expires_at && $tenant->subcription->expires_at < now()) {
            abort(402);
        }
    }
}
