<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrador;


class AdministradorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrador::create([
            'nom_usuari' => 'admin1',
            'contrasenya' => bcrypt('admin123'),
            'correu_electronic' => 'admin1@example.com',
        ]);

        Administrador::create([
            'nom_usuari' => 'admin2',
            'contrasenya' => bcrypt('admin456'),
            'correu_electronic' => 'admin2@example.com',
        ]);

        Administrador::create([
            'nom_usuari' => 'admin3',
            'contrasenya' => bcrypt('admin789'),
            'correu_electronic' => 'admin3@example.com',
        ]);
    }
}
