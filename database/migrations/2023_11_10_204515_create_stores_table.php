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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('item-code');
            $table->text('description');
            $table->string('price');
            $table->string('unit');
            $table->string('type');
            $table->integer('quantity');
            $table->decimal('discount', 5, 2)->default(0.00);
            $table->decimal('tax', 5, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
