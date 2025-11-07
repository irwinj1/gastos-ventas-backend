<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $nombres = [
      ['nombre' => 'Ahuachapán', 'id_pais' => '1'],
      ['nombre' => 'Cabañas', 'id_pais' => '1'],
      ['nombre' => 'Chalatenango', 'id_pais' => '1'],
      ['nombre' => 'Cuscatlán', 'id_pais' => '1'],
      ['nombre' => 'La Libertad', 'id_pais' => '1'],
      ['nombre' => 'La Paz', 'id_pais' => '1'],
      ['nombre' => 'La Unión', 'id_pais' => '1'],
      ['nombre' => 'Morazán', 'id_pais' => '1'],
      ['nombre' => 'San Miguel', 'id_pais' => '1'],
      ['nombre' => 'San Salvador', 'id_pais' => '1'],
      ['nombre' => 'San Vicente', 'id_pais' => '1'],
      ['nombre' => 'Santa Ana', 'id_pais' => '1'],
      ['nombre' => 'Sonsonate', 'id_pais' => '1'],
      ['nombre' => 'Usulután', 'id_pais' => '1']
    ];

    DB::table('departamentos')->insert($nombres);

    }
}
