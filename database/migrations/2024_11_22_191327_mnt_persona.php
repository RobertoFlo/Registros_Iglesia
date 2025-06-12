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
        //Persona
        Schema::create('mnt_persona', function (Blueprint $table) {
            // $table->id();
            $table->string('uuid')->unique()->primary();
            $table->string('primer_nombre', length: 100);
            $table->string('segundo_nombre', length: 100);
            $table->string('primer_apellido', length: 100);
            $table->string('segundo_apellido', length: 100);
            $table->string('nombre_madre', length: 100);
            $table->string('nombre_padre', length: 100);
            $table->string('domicilio', length: 500);
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->unsignedBigInteger('distrito_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('departamento_id')->references('id')->on('ctl_departamento');
            $table->foreign('municipio_id')->references('id')->on('ctl_municipio');
            $table->foreign('distrito_id')->references('id')->on('ctl_distrito');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        schema::drop('mnt_persona');
    }
};
