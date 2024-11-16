<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ofertes;


class OfertesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ofertes::create([
            'horari' => 'Lunes a viernes de 9:00 a 18:00',
            'incorporacio' => now(), 
            'sou' => 20000,
            'edat' => '20-35',
            'idioma1' => 'Espanol',
            'idioma2' => 'Ingles',
            'idioma3' => null,
            'idioma4' => null,
            'tipus_contracte' => 'Indefinido',
            'caducitat_oferta' => '2024-04-30',
            'descripcio' => 'Se busca programador web con experiencia en Laravel.',
            'empreses_id' => 1,
        ]);

        Ofertes::create([
            'horari' => 'Flexible',
            'incorporacio' => now(), 
            'sou' => 25000,
            'edat' => '25-40',
            'idioma1' => 'Espanol',
            'idioma2' => 'Frances',
            'idioma3' => 'Ingles',
            'idioma4' => null,
            'tipus_contracte' => 'Temporal',
            'caducitat_oferta' => '2024-05-15',
            'descripcio' => 'Se precisa un/a ingeniero/a para proyecto de construccion.',
            'empreses_id' => 3,
        ]);

        Ofertes::create([
            'horari' => 'Turno rotativo',
            'incorporacio' => now(), 
            'sou' => 18000,
            'edat' => '18-30',
            'idioma1' => 'Espanol',
            'idioma2' => null,
            'idioma3' => null,
            'idioma4' => null,
            'tipus_contracte' => 'Practicas',
            'caducitat_oferta' => '2024-06-30',
            'descripcio' => 'Se ofrece practicas remuneradas en el area de marketing digital.',
            'empreses_id' => 3,
        ]);
    }
}
