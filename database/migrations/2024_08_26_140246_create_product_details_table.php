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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->unique()->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->longText('description');
            $table->string('image1', 200);
            $table->string('image2', 200);
            $table->string('image3', 200);
            $table->string('image4', 200);
            $table->string('color', 200);
            $table->string('size', 200);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
