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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('date')->nullable();
            $table->string('due_date')->nullable();
            $table->decimal('subtotal', 10, 0)->nullable();
            $table->decimal('shipping', 10, 0)->nullable();
            $table->decimal('discount', 10, 0)->nullable();
            $table->decimal('vat', 10, 0)->nullable();
            $table->decimal('total', 10, 0)->nullable();
            $table->text('notes')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->text('par_code')->nullable();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
