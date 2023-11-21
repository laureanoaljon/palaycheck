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
        Schema::create('season_other_expenses', function (Blueprint $table) {
            $table->id();



            $table->integer('cropping_season_id')->nullable();
            $table->float('expense_gas', 10, 2);
            $table->float('expense_transportasyon', 10, 2);
            $table->float('expense_irigasyon', 10, 2);
            $table->float('expense_sako', 10, 2);
            $table->float('expense_kuryente', 10, 2);
            $table->float('expense_pagkain', 10, 2);
            $table->float('expense_repair', 10, 2);

            $table->integer('versionNumberdexxx')->nullable()->length(10); //new
            $table->dateTime('date_updated')->format('Y-m-d H:i:s'); //new
            $table->integer('is_archived')->default(false)->length(5); //new

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('season_other_expenses');
    }
};
