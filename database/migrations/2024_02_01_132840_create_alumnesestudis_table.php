<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnesEstudisTable extends Migration
{
    public function up()
    {
        Schema::create('alumnesestudis', function (Blueprint $table) {
            $table->unsignedBigInteger('empreses_id');
            $table->unsignedBigInteger('alumne_id');
            $table->unsignedBigInteger('estudi_id');
            $table->foreign('empreses_id')->references('empresa_id')->on('empreses')->onDelete('cascade');
            $table->foreign('alumne_id')->references('alumne_id')->on('alumnes')->onDelete('cascade');
            $table->foreign('estudi_id')->references('estudi_id')->on('estudis')->onDelete('cascade');
            $table->integer('any_finalitzacio')->nullable();
            $table->primary(['alumne_id', 'estudi_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnesestudis');
    }
}
