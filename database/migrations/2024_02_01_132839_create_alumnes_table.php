<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnesTable extends Migration
{
    public function up()
    {
        Schema::create('alumnes', function (Blueprint $table) {
            $table->id('alumne_id');
            $table->string('nom');
            $table->string('primer_cognom');
            $table->string('segon_cognom')->nullable();
            $table->string('dni');
            $table->string('adreca');
            $table->string('codi_postal');
            $table->string('municipi');
            $table->string('provincia');
            $table->date('data_naixement');
            $table->string('primer_telefon')->nullable();
            $table->string('segon_telefon')->nullable();
            $table->string('carnet_conduir')->nullable();
            $table->string('idioma1')->nullable();
            $table->string('idioma2')->nullable();
            $table->string('idioma3')->nullable();
            $table->string('idioma4')->nullable();
            $table->text('observacions')->nullable();
            $table->unsignedBigInteger('usuari_id');
            $table->foreign('usuari_id')->references('usuari_id')->on('usuaris')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnes');
    }
}
