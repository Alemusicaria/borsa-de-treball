<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudisTable extends Migration
{
    public function up()
    {
        Schema::create('estudis', function (Blueprint $table) {
            $table->id('estudi_id');
            $table->string('nom');
            $table->text('descripcio')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudis');
    }
}
