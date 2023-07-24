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
        Schema::create('scheduled_tour', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('property_image_id');
            $table->date('tour_date');
            $table->time('tour_time');
            $table->string('tour_contact_number');
            $table->boolean('confirmation')->default(false);
            $table->timestamps();

            // Add foreign key constraint to link 'property_id' with 'id' in 'properties' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('property_image_id')->references('id')->on('property_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduled_tour');
    }
};
