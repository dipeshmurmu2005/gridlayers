<?php

namespace App\Actions\Platform;

use App\Models\Business;
use App\Models\OnboardData;
use App\Models\Tenant;

class OnboardingAction
{
    private $tenant;
    private $onboardData;
    private $business;
    public function OnboardNewTenant()
    {
        $this->onboardData = OnboardData::where('user_id', auth()->user()->id);
        $this->business = Business::where('slug', $this->business)->first();
        if ($this->onboardData) {
            try {
                $this->createTenant();
                $this->createDatabase();
            } catch (\Throwable $th) {
                info($th);
            }
        }
    }

    public function createTenant()
    {
        $this->tenant = Tenant::create([
            'business_id' => $this->business->id
        ]);
    }

    public function createDatabase() {}
}
