<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class administradorsCambiarNomUsuariANom extends Migration
{

    /*Si realitzem la migracio fara una modificacio*/
    public function up()
    {
        Schema::table('administradors', function (Blueprint $table) {
            $table->renameColumn('nom_usuari', 'nom');
        });
    }

    /*En cas de relaitzar un rollback utilitzara la funcio down osigui
     que en aquesta funcio tornara tot com estaba*/
    public function down()
    {
        Schema::table('administradors', function (Blueprint $table) {
            $table->renameColumn('nom', 'nom_usuari');
        });
    }
}