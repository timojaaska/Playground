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
        Schema::create('playground_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('amount');
            $table->unsignedBigInteger('playground_id');
            $table->foreign('playground_id')->references('id')->on('playgrounds')->onDelete('cascade'); 
            $table->unsignedBigInteger('equipment_id');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playground_equipment');
    }
};
