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
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->string('id_contact')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('status')->nullable();
            $table->string('nome')->nullable();
            $table->string('sobrenome')->nullable();
            $table->string('email')->nullable();
            $table->string('celular',15)->nullable();
            $table->string('telefone_res',15)->nullable();
            $table->string('oficina')->nullable();
            $table->string('fantasia')->nullable();
            $table->string('cargo')->nullable();
            $table->string('ramo')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastros');
    }
};
