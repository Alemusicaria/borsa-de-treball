<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumne;


class AlumnesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumne::create([
            'nom' => 'Marc',
            'primer_cognom' => 'Gomez',
            'segon_cognom' => 'Fernandez',
            'dni' => '98765432C',
            'adreca' => 'Avenida del Parque, 25',
            'codi_postal' => '46001',
            'municipi' => 'Valencia',
            'provincia' => 'Valencia',
            'data_naixement' => '2000-07-10',
            'correu_electronic' => 'marc@example.com',
            'primer_telefon' => '654321987',
            'segon_telefon' => null,
            'carnet_conduir' => true,
            'idioma1' => 'Espanol',
            'idioma2' => 'Ingles',
            'idioma3' => 'Italiano',
            'idioma4' => null,
            'observacions' => 'Alumno sobresaliente en matematicas',
            'codi_acces' => 'zxcvbn123456',
        ]);

        Alumne::create([
            'nom' => 'Ana',
            'primer_cognom' => 'Lopez',
            'segon_cognom' => 'Garcia',
            'dni' => '87654321D',
            'adreca' => 'Calle Mayor, 10',
            'codi_postal' => '28001',
            'municipi' => 'Madrid',
            'provincia' => 'Madrid',
            'data_naixement' => '1999-03-25',
            'correu_electronic' => 'ana@example.com',
            'primer_telefon' => '123456789',
            'segon_telefon' => '987654321',
            'carnet_conduir' => false,
            'idioma1' => 'Espanol',
            'idioma2' => 'Frances',
            'idioma3' => 'Aleman',
            'idioma4' => null,
            'observacions' => 'Participa en el equipo de baloncesto de la escuela',
            'codi_acces' => 'asdfgh654321',
        ]);

        Alumne::create([
            'nom' => 'Lucia',
            'primer_cognom' => 'Martinez',
            'segon_cognom' => 'Fernandez',
            'dni' => '76543210E',
            'adreca' => 'Calle Rosa de los Vientos, 8',
            'codi_postal' => '41001',
            'municipi' => 'Sevilla',
            'provincia' => 'Sevilla',
            'data_naixement' => '2001-11-05',
            'correu_electronic' => 'lucia@example.com',
            'primer_telefon' => '987654321',
            'segon_telefon' => null,
            'carnet_conduir' => true,
            'idioma1' => 'Espanol',
            'idioma2' => 'Ingles',
            'idioma3' => null,
            'idioma4' => null,
            'observacions' => 'Excelente en dibujo y artes plasticas',
            'codi_acces' => 'poiuyt321654',
        ]);
    }
}
