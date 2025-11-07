<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $municipios = [
            ['nombre' => 'Ahuachapán Norte', 'id_departamento' => '1'],
            ['nombre' => 'Ahuachapán Centro', 'id_departamento' => '1'],
            ['nombre' => 'Ahuachapán Sur', 'id_departamento' => '1'],
            ['nombre' => 'Cabañas Este', 'id_departamento' => '2'],
            ['nombre' => 'Cabañas Oeste', 'id_departamento' => '2'],
            ['nombre' => 'Chalatenango Norte', 'id_departamento' => '3'],
            ['nombre' => 'Chalatenango Centro', 'id_departamento' => '3'],
            ['nombre' => 'Chalatenango Sur', 'id_departamento' => '3'],
            ['nombre' => 'Cuscatlán Norte', 'id_departamento' => '4'],
            ['nombre' => 'Cuscatlán Sur', 'id_departamento' => '4'],
            ['nombre' => 'La Libertad Norte', 'id_departamento' => '5'],
            ['nombre' => 'La Libertad Centro', 'id_departamento' => '5'],
            ['nombre' => 'La Libertad Oeste', 'id_departamento' => '5'],
            ['nombre' => 'La Libertad Este', 'id_departamento' => '5'],
            ['nombre' => 'La Libertad Costa', 'id_departamento' => '5'],
            ['nombre' => 'La Libertad Sur', 'id_departamento' => '5'],
            ['nombre' => 'La Paz Oeste', 'id_departamento' => '6'],
            ['nombre' => 'La Paz Centro', 'id_departamento' => '6'],
            ['nombre' => 'La Paz Este', 'id_departamento' => '6'],
            ['nombre' => 'La Union Norte', 'id_departamento' => '7'],
            ['nombre' => 'La Union Sur', 'id_departamento' => '7'],
            ['nombre' => 'Morazán Norte', 'id_departamento' => '8'],
            ['nombre' => 'Morazán Sur', 'id_departamento' => '8'],
            ['nombre' => 'San Miguel Norte', 'id_departamento' => '9'],
            ['nombre' => 'San Miguel Centro', 'id_departamento' => '9'],
            ['nombre' => 'San Miguel Oeste', 'id_departamento' => '9'],
            ['nombre' => 'San Salvador Norte', 'id_departamento' => '10'],
            ['nombre' => 'San Salvador Oeste', 'id_departamento' => '10'],
            ['nombre' => 'San Salvador Este', 'id_departamento' => '10'],
            ['nombre' => 'San Salvador Centro', 'id_departamento' => '10'],
            ['nombre' => 'San Salvador Sur', 'id_departamento' => '10'],
            ['nombre' => 'San Vicente Norte', 'id_departamento' => '11'],
            ['nombre' => 'San Vicente Sur', 'id_departamento' => '11'],
            ['nombre' => 'Santa Ana Norte', 'id_departamento' => '12'],
            ['nombre' => 'Santa Ana Centro', 'id_departamento' => '12'],
            ['nombre' => 'Santa Ana Este', 'id_departamento' => '12'],
            ['nombre' => 'Santa Ana Oeste', 'id_departamento' => '12'],
            ['nombre' => 'Sonsonate Norte', 'id_departamento' => '13'],
            ['nombre' => 'Sonsonate Centro', 'id_departamento' => '13'],
            ['nombre' => 'Sonsonate Este', 'id_departamento' => '13'],
            ['nombre' => 'Sonsonate Oeste', 'id_departamento' => '13'],
            ['nombre' => 'Usulután Norte', 'id_departamento' => '14'],
            ['nombre' => 'Usulután Este', 'id_departamento' => '14'],
            ['nombre' => 'Usulután Oeste', 'id_departamento' => '14']

        ];
        DB::table('municipios')->insert($municipios);


    }
}
