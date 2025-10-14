<?php

namespace Database\Seeders;

use App\Models\TipoArchivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoArchivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tipo_archivos = ["ventas","gastos"];
        foreach ($tipo_archivos as $archivo) {
            TipoArchivo::firstOrCreate(['nombre' => $archivo]);
        }
    }
}
