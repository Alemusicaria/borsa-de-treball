<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OfertaEstudis;


class OfertaestudisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OfertaEstudis::create(['oferta_id' => 1, 'estudi_id' => 1]);
        OfertaEstudis::create(['oferta_id' => 2, 'estudi_id' => 2]);
        OfertaEstudis::create(['oferta_id' => 3, 'estudi_id' => 3]);

    }
}
