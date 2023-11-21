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
        Schema::create('cropping_seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('farm_id')->nullable();
            $table->string('rice_variety_linedesig')->nullable(); //new
            $table->string('rice_variety');
            $table->string('rice_variety_source')->nullable();
            $table->date('seeding_date');
            $table->string('crop_establishment')->nullable();
            $table->integer('totalweight_tobeEstablished');
            $table->float('totalExpense_forSeed', 8, 2);

            $table->boolean('is_finished')->nullable(); //new
            $table->date('harvest_date')->nullable(); //new
            $table->float('total_income', 8, 2)->nullable(); //new
            $table->float('netong_income', 8, 2)->nullable(); //new

            $table->string('fert_guide_used')->nullable();
            // $table->string('fert_guide_used_details')->nullable();

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
        Schema::dropIfExists('cropping_seasons');
    }
};
