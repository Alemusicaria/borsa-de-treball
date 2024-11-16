<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlumnesEstudis;


class AlumnesEstudisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
       AlumnesEstudis::create([
            'empreses_id' => 1,
            'alumne_id' => 1,
            'estudi_id' => 1,
            'any_finalitzacio' => 2003,
        ]);

        AlumnesEstudis::create([
            'empreses_id' => 2,
            'alumne_id' => 2,
            'estudi_id' => 2,
            'any_finalitzacio' => 2004,
        ]);

        AlumnesEstudis::create([
            'empreses_id' => 3,
            'alumne_id' => 3,
            'estudi_id' => 3,
            'any_finalitzacio' => 2005,
        ]);
    }
}
