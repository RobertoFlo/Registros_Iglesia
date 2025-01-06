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
        //
        Schema::create('mnt_boda', function(Blueprint $table){
            $table->id();
            $table->integer('numero_expediente');
            $table->integer('numero_libro');
            $table->integer('libro');
            $table->integer('folio');
            $table->string('anios_libro',length: 9);
            $table->date('fecha_declaracion');
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
        schema::drop('mnt_boda');

    }
};
