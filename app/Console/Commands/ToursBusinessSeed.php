<?php

namespace App\Console\Commands;

use App\Models\Business;
use App\Models\Tenant;
use Database\Seeders\Business\Tours\DatabaseSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ToursBusinessSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tours-business-seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $business = Business::where('slug', 'tours')->first();
        $tenants = Tenant::where('business_id', $business->id)->get();

        foreach ($tenants as $tenant) {
            config([
                'database.connections.tenant.database' => $tenant->db_name,
                'database.connections.tenant.username' => 'root',
                'database.connections.tenant.password' => 'password',
            ]);
            $business_name = strtolower($tenant->Business->name);

            DB::purge('tenant');
            if ($tenant->is_seeded) {
                $this->call('migrate:fresh', [
                    '--database' => "tenant",
                    '--path' => 'database/migrations/tenant/tours',
                    '--force' => true,
                ]);
                $this->info('Migrating completed successfully!');
            }

            DB::reconnect('tenant');

            $this->call('db:seed', [
                '--database' => "tenant",
                '--class' => DatabaseSeeder::class,
                '--force' => true,
            ]);

            $tenant->is_seeded = true;
            $tenant->save();
            $this->info('Seeding completed successfully!');
        }
    }
}
