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
        Schema::create('users', function (Blueprint $table) {
            $table->comment('Utilizada para la gestión de usuario, permisos y accesos');
            $table->id()->comment('PK incremental');
            $table->string('name')->comment('Nombre del usuario');
            $table->string('email')->unique()->comment('Correo del usuario');
            $table->timestamp('email_verified_at')->nullable()->comment('Campo de verificación de correo');
            $table->string('password')->comment('Clave encriptada');
            $table->rememberToken()->comment('Token para reestablecer la contraseña');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
