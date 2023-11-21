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
        Schema::table('cropping_seasons', function (Blueprint $table) {
            $table->Integer('user_id')->nullable();
        });

        Schema::table('recommended_crop_calendar', function (Blueprint $table) {
            $table->Integer('user_id')->nullable();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->Integer('user_id')->nullable();
        });

        Schema::table('activities_ferts', function (Blueprint $table) {
            $table->Integer('user_id')->nullable();
        });

        Schema::table('activities_chemical', function (Blueprint $table) {
            $table->Integer('user_id')->nullable();
        });

        Schema::table('season_harvest_info', function (Blueprint $table) {
            $table->Integer('user_id')->nullable();
        });

        Schema::table('season_other_expenses', function (Blueprint $table) {
            $table->Integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cropping_seasons', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('recommended_crop_calendar', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('activities_ferts', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('activities_chemical', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('season_harvest_info', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('season_other_expenses', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        
    }
};
