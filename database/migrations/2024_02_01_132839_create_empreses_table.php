<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresesTable extends Migration
{
    public function up()
    {
        Schema::create('empreses', function (Blueprint $table) {
            $table->id('empresa_id');
            $table->string('nif');
            $table->string('nom');
            $table->string('persona_contacte');
            $table->string('primer_telefon_contacte')->nullable();
            $table->string('segon_telefon_contacte')->nullable();
            $table->string('adreca')->nullable();
            $table->string('codi_postal');
            $table->string('municipi');
            $table->string('provincia');
            $table->boolean('validada')->default(false);
            $table->unsignedBigInteger('usuari_id');
            $table->foreign('usuari_id')->references('usuari_id')->on('usuaris')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empreses');
    }
}
