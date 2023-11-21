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
        Schema::create('activities_chemical', function (Blueprint $table) {
            $table->id();

            $table->integer('recomtask_id')->nullable(); // id from recommended crop calendar
            $table->string('chemical_name');
            $table->float('chem_quantity', 10, 2);
            $table->float('chem_expense', 10, 2);
            $table->string('chem_unit_ofmeasure', 30); //new

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
        Schema::dropIfExists('activities_chemical');
    }
};
