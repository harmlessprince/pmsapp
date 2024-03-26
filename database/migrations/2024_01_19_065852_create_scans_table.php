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
        Schema::create('scans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained('sites');
            $table->foreignId('tag_id')->constrained('tags');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('scanned_by')->constrained('users');
            $table->string('proximity')->nullable();
            $table->double('distance', 10, 6)->nullable();
            $table->time('scan_time');
            $table->date('scan_date');
            $table->dateTime('scan_date_time');
            $table->double('latitude', 10, 6)->nullable();
            $table->double('longitude', 10, 6)->nullable();
            $table->integer('round')->nullable();
            $table->integer('gap_duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scans');
    }
};
