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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId("created_by")->constrained('users');
            $table->foreignId('inspector_id')->constrained('users');
            $table->foreignId("state_id")->constrained('states');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('address');
            $table->string('logout_pin');
            $table->boolean('status')->default(true);
            $table->integer('number_of_tags')->default(1);
            $table->integer('maximum_number_of_rounds')->default(1);
            $table->time('shift_start_time')->nullable();
            $table->time('shift_end_time')->nullable();
            $table->double('latitude', 10, 6)->nullable();
            $table->double('longitude', 10, 6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
