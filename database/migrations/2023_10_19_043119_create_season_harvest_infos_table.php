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
        Schema::create('season_harvest_info', function (Blueprint $table) {
            $table->id();

            $table->integer('cropping_season_id')->nullable();
            $table->float('total_sackcount', 10, 2);
            $table->integer('average_sackweight')->nullable();
            $table->float('palay_price', 10, 2);

            $table->string('caretaker_paymentmode');
            $table->integer('caretakerpayment_inpercent');
            $table->float('caretakerpayment_inmoney', 10, 2);

            $table->integer('versionNumber')->nullable()->length(10); //new
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
        Schema::dropIfExists('season_harvest_info');
    }
};
