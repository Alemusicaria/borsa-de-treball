<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnesOfertesTable extends Migration
{
    public function up()
    {
        Schema::create('alumnesofertes', function (Blueprint $table) {
            $table->unsignedBigInteger('alumne_id');
            $table->unsignedBigInteger('oferta_id');
            $table->foreign('oferta_id')->references('oferta_id')->on('ofertes')->onDelete('cascade');
            $table->foreign('alumne_id')->references('alumne_id')->on('alumnes')->onDelete('cascade');
            $table->date('data_interes')->nullable();
            $table->boolean('vist_empresa')->default(false);
            $table->primary(['alumne_id', 'oferta_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnesofertes');
    }
}
