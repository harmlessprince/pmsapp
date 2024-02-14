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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('username')->nullable()->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->string('address')->nullable();
            $table->foreignId('state_id')->nullable()->constrained('states');
            $table->boolean('status')->default(true);
            $table->string('password')->nullable();
            $table->foreignId("created_by")->nullable()->constrained('users');
            $table->unsignedInteger("company_id")->nullable()->index('company_id_index');
            $table->unsignedInteger("site_id")->nullable()->index('site_id_index');

            $table->time('shift_start_time')->nullable();
            $table->time('shift_end_time')->nullable();
            $table->float('normal_rate_per_hour')->nullable();
            $table->float('sunday_rate_per_hour')->nullable();
            $table->float('holiday_rate_per_hour')->nullable();
            $table->integer('number_of_night_shift')->nullable();
            $table->float('night_shift_allowance')->nullable();
            $table->string("profile_image")->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
