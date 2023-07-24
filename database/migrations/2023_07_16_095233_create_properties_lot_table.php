<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties_lot', function (Blueprint $table) {
            $table->bigIncrements('lot_id');
            $table->string('lot_address');
            $table->integer('lot_price');
            $table->integer('lot_area');
            $table->string('lot_type');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_lot');
    }
};
