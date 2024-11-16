<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlumnesOfertes;


class AlumnesOfertesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlumnesOfertes::create([
            'alumne_id' => 1,
            'oferta_id' => 1,
            'data_interes' => now(),
            'vist_empresa' => true,
        ]);

        AlumnesOfertes::create([
            'alumne_id' => 2,
            'oferta_id' => 2,
            'data_interes' => now(),
            'vist_empresa' => false,
        ]);

        AlumnesOfertes::create([
            'alumne_id' => 3,
            'oferta_id' => 3,
            'data_interes' => now(),
            'vist_empresa' => true,
        ]);
    }
}
