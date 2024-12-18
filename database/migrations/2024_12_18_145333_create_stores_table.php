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
            $table->string('store_name', 100);
            $table->unsignedBigInteger('type_id');
            $table->string('id_card_number', 20)->unique();
            $table->string('owner');
            $table->text('address')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->text('location_store')->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('city', 50)->nullable();            
            $table->foreign('type_id')->references('id')->on('store_types')->onDelete('cascade');
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
