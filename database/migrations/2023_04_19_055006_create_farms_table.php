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
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->nullable();
            $table->String('name');

            // $table->string('region');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('addtnl_address')->nullable();

            $table->float('size', 8, 2);
            $table->string('water_source');
            $table->string('tenurial_status');
            // $table->string('cropping_pattern');

            $table->integer('versionNumber')->nullable()->length(10); 
            $table->dateTime('date_updated')->format('Y-m-d H:i:s');
            $table->integer('is_archived')->nullable()->length(5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
