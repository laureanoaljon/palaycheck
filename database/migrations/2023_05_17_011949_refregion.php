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
        Schema::create('refregion', function (Blueprint $table) {
            $table->id();
            $table->integer('psgc');
            $table->string('region');
            $table->integer('reg_code');
        });


        // $data = [
        //     [
        //         'psgc' => '100000000',
        //         'region' => 'Region I (Ilocos Region)',
        //         'reg_code' => '10',
        //     ],
        //     [
        //         'psgc' => 'John Doe',
        //         'region' => 'johndoe@example.com',
        //         'integer' => bcrypt('password123'),
        //     ],
        // ];
        // DB::table('refregion')->insert($data);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refregion');
    }

};
