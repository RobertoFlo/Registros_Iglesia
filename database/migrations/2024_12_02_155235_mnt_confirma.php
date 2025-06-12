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

        Schema::create('mnt_confirma', function (Blueprint $table) {
            $table->id();
            $table->string('padre_confirma', length: 100);
            $table->string('comentarios', length: 500)->nullable();
            $table->integer('libro');
            $table->integer('folio');
            $table->integer('year');
            $table->date('fecha_confirma');
            $table->string('persona_id');
            $table->foreign('persona_id')->references('uuid')->on('mnt_persona');
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
        schema::drop('mnt_confirma');

    }
};
