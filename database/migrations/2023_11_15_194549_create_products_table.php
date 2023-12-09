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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('item')->nullable();
            $table->string('item_code')->nullable();
            $table->text('par_code')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('unit')->nullable();
            $table->string('type')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('discount', 5, 2)->default(0.00)->nullable();
            $table->decimal('tax', 5, 2)->default(0.00)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
