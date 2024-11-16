<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorsTable extends Migration
{
    public function up()
    {
        Schema::create('administradors', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('nom_usuari');
            $table->string('contrasenya');
            $table->string('correu_electronic');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administradors');
    }
}
