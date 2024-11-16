<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertesTable extends Migration
{
    public function up()
    {
        Schema::create('ofertes', function (Blueprint $table) {
            $table->id('oferta_id');
            $table->string('horari');
            $table->date('incorporacio');
            $table->decimal('sou', 10, 2);
            $table->string('edat');
            $table->string('idioma1')->nullable();
            $table->string('idioma2')->nullable();
            $table->string('idioma3')->nullable();
            $table->string('idioma4')->nullable();
            $table->string('tipus_contracte');
            $table->date('caducitat_oferta');
            $table->text('descripcio');
            $table->unsignedBigInteger('empreses_id');
            $table->foreign('empreses_id')->references('empresa_id')->on('empreses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ofertes');
    }
}
