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
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('cus_name', 50);
            $table->string('cus_city', 50);
            $table->string('cus_state', 50);
            $table->string('cus_address', 200);
            $table->string('cus_postcode', 30);
            $table->string('cus_country', 50);
            $table->string('cus_phone', 30);
            $table->string('cus_fax', 30);

            $table->string('ship_name', 50);
            $table->string('ship_city', 50);
            $table->string('ship_state', 50);
            $table->string('ship_address', 200);
            $table->string('ship_postcode', 30);
            $table->string('ship_country', 50);
            $table->string('ship_phone', 30);
            $table->string('ship_fax', 30);

            $table->foreignId('user_id')->unique()->constrained()->onUpdate('cascade')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_profiles');
    }
};
