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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                  ->constrained(table: 'categories', indexName: 'id')
                  ->onDelete('cascade');
            $table->string('title', 50);
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->string('sku');
            $table->string('picture');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
