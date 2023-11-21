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
        Schema::create('refmunicipality', function (Blueprint $table) {
            $table->id();
            $table->integer('psgc');
            $table->string('municipality');
            $table->string('geographic_level');
            $table->integer('reg_code');
            $table->integer('prov_code');
            $table->integer('city_mun_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refmunicipality');
    }
};
