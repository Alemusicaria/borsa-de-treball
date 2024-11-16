<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estudis;


class EstudisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Estudis::create([
                'nom' => 'Informatica',
                'descripcio' => 'Estudis relacionats amb la informatica i la tecnologia de la informacio.',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        
        Estudis::create([
                'nom' => 'Matematiques',
                'descripcio' => 'Estudis centrats en les matematiques i les seves aplicacions.',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        
        Estudis::create([
                'nom' => 'Fisica',
                'descripcio' => 'Estudis de les lleis de la naturalesa, els fenomens fisics i les seves aplicacions.',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
    }
}

