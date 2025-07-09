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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status')->default(true);
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId("created_by")->constrained('users');
            $table->foreignId("supervisor_id")->constrained('users');
            $table->timestamps();
        });

        $tables = ['users', 'sites'];
        foreach ($tables as $tableToModify) {
            if (Schema::hasTable($tableToModify)) {
                if (!Schema::hasColumn($tableToModify, 'region_id')) {
                    Schema::table($tableToModify, function (Blueprint $table) {
                        $table->foreignId('region_id')->nullable()->constrained('regions');
                    });
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
        $tables = ['users', 'sites', 'tags', 'scans', 'incidents', 'attendances'];
        foreach ($tables as $tableToModify) {
            if (Schema::hasTable($tableToModify)) {
                if (Schema::hasColumn($tableToModify, 'region_id')) {
                    Schema::table($tableToModify, function (Blueprint $table) {
                        $table->dropForeign(['region_id']);
                    });
                }
            }
        }
    }
};
