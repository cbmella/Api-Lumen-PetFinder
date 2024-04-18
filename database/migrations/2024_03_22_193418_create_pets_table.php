<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('photo_url');
            $table->enum('status', ['lost', 'adoption']); // Campo para indicar si la mascota está perdida o en adopción
            $table->string('breed')->nullable(); // Campo para la raza de la mascota
            $table->integer('age')->nullable(); // Campo para la edad de la mascota
            $table->text('personality')->nullable(); // Campo para la personalidad de la mascota
            $table->text('adoption_requirements')->nullable(); // Campo para los requisitos de adopción
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
