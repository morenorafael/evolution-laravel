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
        Schema::create('evolution_instances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('identification')->unique();
            $table->unsignedInteger('instanceable_id');
            $table->string('instanceable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evolution_instances');
    }
};
