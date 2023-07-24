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
        Schema::create('properties_condo', function (Blueprint $table) {
            $table->bigIncrements('condo_id');
            $table->string('condo_address');
            $table->integer('condo_price');
            $table->integer('condo_floor_area');
            $table->string('condo_type');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_condo');
    }
};
