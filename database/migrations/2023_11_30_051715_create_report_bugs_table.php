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
        Schema::create('report_bugs', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->nullable();
            $table->String('subject')->nullable();
            $table->String('problem_desc')->nullable();
            $table->String('screenshot_name')->nullable();
            $table->dateTime('created_at')->format('Y-m-d H:i:s'); //new

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_bugs');
    }
};
