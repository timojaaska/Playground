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
        Schema::create('playgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            // $table->longText('src');
            $table->longText('src')->nullable(); // oletus arvoksi null niin kentän voi jättää lomakkeessa tyhjäksi
            // tämä tässä ylhäällä pitäisi vielä testata, mikraatiot pitäs ajaa uusiks
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playgrounds');
    }
};
