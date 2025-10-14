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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipo_archivo')->constrained('tipo_archivos')->cascadeOnDelete();
            $table->unsignedBigInteger('id_referencia');
            $table->string('nombre_archivo', 200);
            $table->string('ruta', 300);
            $table->string('extension', 10)->nullable();
            $table->integer('tamanio')->nullable(); // tamaño en KB
            $table->timestamps();
            
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
