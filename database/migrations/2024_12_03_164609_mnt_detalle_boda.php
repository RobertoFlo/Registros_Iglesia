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
        Schema::create('mnt_detalle_boda', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_testigo', length: 150);
            $table->unsignedBigInteger('persona_id')->unique();
            $table->foreign('persona_id')->references('id')->on('mnt_persona');
            $table->unsignedBigInteger('boda_id');
            $table->foreign('boda_id')->references('id')->on('mnt_boda');
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
        schema::drop('mnt_detalle_boda');

    }
};
