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
        Schema::create('mnt_bautizo', function (Blueprint $table) {
            $table->id();
            $table->string('padre_bautizo', length: 100);
            $table->string('nombre_madrina', length: 100);
            $table->string('nombre_padrino', length: 100);
            $table->string('comentarios', length: 500)->nullable();
            $table->date('fecha_bautizo');
            $table->integer('libro');
            $table->integer('folio');
            $table->integer('year');
            $table->unsignedBigInteger('persona_id')->unique();
            $table->foreign('persona_id')->references('id')->on('mnt_persona');
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
        schema::drop('mnt_bautizo');
    }
};
