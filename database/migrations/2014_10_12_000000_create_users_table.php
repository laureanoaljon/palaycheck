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
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('sex', 10);
            // $table->string('email')->unique()->nullable();
            $table->string('username')->unique();
            $table->string('telepono')->unique();
            $table->string('password');
            $table->string('rsbsa_no')->nullable();
            // $table->string('civil_status', 10);
            // $table->string('region');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('addtnl_address')->nullable();
            $table->boolean('is_farmerOrg_member')->nullable();
            $table->string('organization_type')->nullable();
            $table->string('organization_name')->nullable();
            
            $table->integer('versionNumber')->nullable()->length(10); // This specifies an integer column with a length of 10
            $table->dateTime('date_updated')->format('Y-m-d H:i:s');
            $table->integer('is_archived')->nullable()->length(5);


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
