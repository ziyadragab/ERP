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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('town')->nullable();
            $table->string('country')->nullable();
            $table->integer('post_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('name_ship')->nullable();
            $table->string('address_1_ship')->nullable();
            $table->string('address_2_ship')->nullable();
            $table->string('town_ship')->nullable();
            $table->string('county_ship')->nullable();
            $table->string('post_code_ship')->nullable();
            $table->string('phone_ship')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
