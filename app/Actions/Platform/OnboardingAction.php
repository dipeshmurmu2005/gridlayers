<?php

namespace App\Actions\Platform;

use App\Enums\SubscriptionStatusEnum;
use App\Enums\TenantStatusEnum;
use App\Models\Business;
use App\Models\OnboardData;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Services\TenantDatabaseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function Illuminate\Support\now;

class OnboardingAction
{
    private $tenant;
    private $onboardData;
    private $business;
    private $plan;
    public function OnboardNewTenant()
    {
        $this->onboardData = OnboardData::where('user_id', auth()->user()->id)->first();
        $this->business = Business::where('slug', $this->onboardData->business_slug)->first();
        $this->plan = $this->business->plans()->where('slug', $this->onboardData['plan_slug'])->first();
        if ($this->onboardData && $this->business && $this->plan) {
            try {
                DB::transaction(function () {
                    $this->createTenant();
                    $this->createSubscription();
                });
                $this->createDatabase($this->tenant->db_name);
                $this->migrateTenant();
                session()->forget('onboarding_data');
                $this->onboardData->delete();
            } catch (\Throwable $th) {
                dd($th);
                info($th);
            }
        }
    }

    public function createTenant()
    {
        $this->tenant = Tenant::create([
            'name' => $this->onboardData->business_name,
            'user_id' => auth()->user()->id,
            'domain' => $this->onboardData->domain,
            'status' => TenantStatusEnum::ACTIVE,
            'business_id' => $this->business->id,
            'theme_id' => $this->onboardData->theme->id,
            'username' => $this->onboardData->domain,
            'password' => 'password',
        ]);
        $this->tenant->db_name = 'mytenant_' . $this->tenant->id;
        $this->tenant->save();
    }

    public function createDatabase(string $databaseName): void
    {
        DB::statement("DROP DATABASE IF EXISTS `$databaseName`");
        DB::statement("CREATE DATABASE IF NOT EXISTS `$databaseName`");
    }

    public function migrateTenant()
    {
        $tenantDatabaseService = new TenantDatabaseService();
        $migrationPath = $tenantDatabaseService->getMigrationPath($this->tenant);
        info('tenant', [$this->tenant->id, $this->tenant->db_name]);
        $tenantDatabaseService->migrateFreshDatabase($this->tenant->db_name, $migrationPath);
    }

    public function createSubscription()
    {
        $subscription = Subscription::create([
            'user_id' => auth()->user()->id,
            'tenant_id' => $this->tenant->id,
            'business_id' => $this->business->id,
            'plan_id' => $this->plan->id,
            'billing_cycle' => $this->onboardData->billing_cycle,
            'subtotal' => $this->onboardData->subtotal,
            'total_amount' => $this->onboardData->total_amount,
            'status' => SubscriptionStatusEnum::PENDING,
        ]);
        if ($this->onboardData->is_trial) {
            $subscription->status = SubscriptionStatusEnum::TRIALING;
            $subscription->paid_amount = 0;
            $subscription->expires_at = now()->addDays(7);
            $subscription->save();
        }
    }
}
