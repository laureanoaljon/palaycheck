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
        Schema::create('recommended_crop_calendar', function (Blueprint $table) {
            $table->id();
            $table->integer('cropping_season_id')->nullable();
            $table->integer('timing')->nullable();
            $table->string('category', 50)->nullable();
            $table->string('task_name', 50)->nullable();
            $table->string('addtnl_details')->nullable();
            $table->float('expenses', 8, 2)->nullable();
            
            $table->date('date')->nullable(); //format YYYY-MM-DD

            $table->time('time')->nullable();

            $table->string('temp_details')->nullable();
            $table->boolean('is_done')->nullable();
            $table->string('timing_type', 30)->nullable();
            $table->boolean('made_byuser')->nullable();
            $table->date('taskweek_startdate')->nullable();
            $table->date('taskweek_enddate')->nullable();
            $table->date('date_done')->nullable();//format YYYY-MM-DD
            $table->string('activity_dependent', 50)->nullable();

            $table->integer('versionNumber')->nullable()->length(10); //new
            $table->dateTime('date_updated')->format('Y-m-d H:i:s'); //new
            $table->integer('is_archived')->nullable()->length(5); //new
            
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommended_crop_calendar');
    }
};
