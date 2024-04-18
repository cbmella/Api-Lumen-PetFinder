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
        Schema::table('pets', function (Blueprint $table) {
            // Eliminar el campo 'breed' existente
            $table->dropColumn('breed');
            
            // Agregar un nuevo campo 'breed_id' como clave foránea
            $table->unsignedBigInteger('breed_id')->nullable()->after('status');
            $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            // Eliminar la clave foránea y el campo 'breed_id'
            $table->dropForeign(['breed_id']);
            $table->dropColumn('breed_id');
            
            // Agregar nuevamente el campo 'breed' como estaba originalmente
            $table->string('breed')->nullable()->after('status');
        });
    }
};
