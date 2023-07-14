<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Oficina;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 7; $i++) {
            $oficina1 = Oficina::create(['nombre_oficina' => 'OFICINA'.$i, 'password' => '2022']);
        }



    }
}
