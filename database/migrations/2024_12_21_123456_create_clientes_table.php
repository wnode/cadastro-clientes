<?php

// Desafio Essentia Desenvolvedor - Back End

// Migration: database/migrations/xxxx_xx_xx_create_clientes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    // Run the migrations
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nome'); // Client name
            $table->string('email')->unique(); // Unique email
            $table->string('telefone'); // Phone number
            $table->string('foto'); // Path to photo
            $table->timestamps(); // Created and updated timestamps
        });
    }

    // Reverse the migrations
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}