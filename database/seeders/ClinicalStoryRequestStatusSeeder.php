<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicalStoryRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\ClinicalStoryRequestStatus::create([
             'name' => 'Solicitada',
             'description' => 'Se realizo la solicitud',
         ]);

        \App\Models\ClinicalStoryRequestStatus::create([
            'name' => 'Recibida',
            'description' => 'Se recepciono la historia clinica',
        ]);

        \App\Models\ClinicalStoryRequestStatus::create([
            'name' => 'No recibida',
            'description' => 'No se recepciono la historia clinca. Revisar el detalle',
        ]);
    }
}
