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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("display_name");
            $table->integer("maximum_number_of_tags")->default(0);
            $table->string("phone_number")->unique();
            $table->boolean("status")->default(true);
            $table->foreignId("owner_id")->constrained('users');
            $table->foreignId("created_by")->constrained('users');
            $table->foreignId("industry_id")->constrained('industries');
            $table->foreignId("state_id")->constrained('states');
            $table->string("city");
            $table->string("address")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
