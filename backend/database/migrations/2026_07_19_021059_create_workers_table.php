<?php

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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('worker_type_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Professional Information
            $table->unsignedTinyInteger('experience')->default(0);
            $table->text('description')->nullable();

            // Future Feature (pricing)
            $table->decimal('hourly_rate', 8, 2)->nullable();

            // GPS Location
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Status
            $table->boolean('is_available')->default(true);
            $table->boolean('is_verified')->default(false);

            // Profile Photo
            $table->string('profile_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
