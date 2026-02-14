<?php

use App\Enums\Business\Tours\PackageStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('duration_days');
            $table->decimal('original_price', 12, 2);
            $table->decimal('discounted_price', 12, 2);
            $table->string('type');
            $table->string('status')->default(PackageStatusEnum::INACTIVE);
            $table->date('trip_start_date');
            $table->date('trip_end_date');
            $table->string('slug');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_offer')->default(false);
            $table->text('short_description');
            $table->longText('description')->nullable();
            $table->json('services')->nullable();
            $table->json('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
