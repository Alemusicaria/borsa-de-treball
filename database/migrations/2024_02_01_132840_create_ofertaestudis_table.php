<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaEstudisTable extends Migration
{
    public function up()
    {
        Schema::create('ofertaestudis', function (Blueprint $table) {
        $table->unsignedBigInteger('oferta_id');
            $table->unsignedBigInteger('estudi_id');
            $table->foreign('oferta_id')->references('oferta_id')->on('ofertes')->onDelete('cascade');
            $table->foreign('estudi_id')->references('estudi_id')->on('estudis')->onDelete('cascade');
            $table->primary(['oferta_id', 'estudi_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ofertaestudis');
    }
}
