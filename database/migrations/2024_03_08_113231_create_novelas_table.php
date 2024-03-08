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
        Schema::create('novelas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre')->unique();
            $table->string('descripcion');
            $table->string('categoria');
            $table->integer('estado');
            $table->integer('edad_minima');
            $table->unsignedBigInteger('autores_autor_id');
            $table->foreign('autores_autor_id')->references('id')->on('autors');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novelas');
    }
};
