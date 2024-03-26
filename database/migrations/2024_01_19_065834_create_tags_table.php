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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->index('tag_code');
            $table->string('type')->index('tag_type')->default('qr'); //qr or live
            $table->foreignId('site_id')->constrained('sites');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->double('latitude', 10, 6)->nullable();
            $table->double('longitude', 10, 6)->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->unique(['site_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
