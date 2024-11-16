<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empreses;


class EmpresesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empreses::create([
            'nif' => '12345678A',
            'nom' => 'Empresa Uno',
            'correu_electronic' => 'empresa1@example.com',
            'persona_contacte' => 'Juan Perez',
            'primer_telefon_contacte' => '123456789',
            'segon_telefon_contacte' => '987654321',
            'adreca' => 'Calle Principal, 123',
            'codi_postal' => '08001',
            'municipi' => 'Barcelona',
            'provincia' => 'Barcelona',
            'codi_acces' => 'abcdef123456',
            'validada' => true,
        ]);

        Empreses::create([
            'nif' => '87654321B',
            'nom' => 'Empresa Dos',
            'correu_electronic' => 'empresa2@example.com',
            'persona_contacte' => 'Ana Martinez',
            'primer_telefon_contacte' => '987654321',
            'segon_telefon_contacte' => null,
            'adreca' => 'Carrer Major, 45',
            'codi_postal' => '28002',
            'municipi' => 'Madrid',
            'provincia' => 'Madrid',
            'codi_acces' => 'qwerty987654',
            'validada' => true,
        ]);

        Empreses::create([
            'nif' => '98765432C',
            'nom' => 'Empresa Tres',
            'correu_electronic' => 'empresa3@example.com',
            'persona_contacte' => 'Luis Fernandez',
            'primer_telefon_contacte' => '654321987',
            'segon_telefon_contacte' => '123456789',
            'adreca' => 'Avinguda del Parc, 10',
            'codi_postal' => '46001',
            'municipi' => 'Valencia',
            'provincia' => 'Valencia',
            'codi_acces' => 'zxcvbn123456',
            'validada' => false,
        ]);
    }
}
