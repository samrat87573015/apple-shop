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
            $table->string('title', 300);
            $table->string('short_des', 500);
            $table->string('price', 50);
            $table->string('image', 200);
            $table->boolean('discount');
            $table->string('discount_price', 50)->nullable();
            $table->boolean('stock');
            $table->float('star');
            $table->enum('remark', ['popular', 'new', 'hot', 'top', 'special', 'trending', 'recommend']);
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('brand_id')->constrained()->onUpdate('cascade')->onDelete('restrict');

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
