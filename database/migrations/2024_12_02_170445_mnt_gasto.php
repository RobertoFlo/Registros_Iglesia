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
        Schema::create('mnt_gasto', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', length: 500);
            $table->date('fecha');
            $table->decimal('monto', 10, 2);
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('ctl_tipo_gasto');
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
        schema::drop('mnt_gasto');

    }
};
