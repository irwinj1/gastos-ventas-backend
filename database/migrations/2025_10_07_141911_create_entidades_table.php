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
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('nombre_comercial')->nullable();
            $table->string('email')->nullable();
            $table->string('dui')->nullable();
            $table->string('nit')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('n_registro')->nullable();
            $table->foreignId('id_distrito')->constrained('distritos')->onDelete('cascade');

            // Roles
            $table->boolean('es_cliente')->default(false);
            $table->boolean('es_proveedor')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidades');
    }
};
