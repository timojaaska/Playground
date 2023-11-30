<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('playground_id'); // kommentoitavan leikkikentän id tulee tähän
            $table->foreign('playground_id')->references('id')->on('playgrounds')->onDelete('cascade'); // paritetaan playgrounds taulun kanssa, cascade poistaa parituksen poistetusta leikkikentästä
            $table->integer('rating'); // itse arvostelut
            $table->text('comment')->nullable(); // tähän kenttään tallennetaan käyttäjän kommentit
            $table->timestamps(); // aikaleimasin
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};

