<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $paises = [
        ['nombre' => 'El Salvador', 'siglas' => 'SV', 'codigo_area' => '503', 'mask' => '9999-9999'],
        ['nombre' => 'Alemania', 'siglas' => 'DE', 'codigo_area' => '49', 'mask' => '99-999-999-9'],
        ['nombre' => 'Arabia Saudita', 'siglas' => 'SA', 'codigo_area' => '966', 'mask' => '999-9999'],
        ['nombre' => 'Argentina', 'siglas' => 'AR', 'codigo_area' => '54', 'mask' => '999-9999-9999'],
        ['nombre' => 'Australia', 'siglas' => 'AU', 'codigo_area' => '61', 'mask' => '9-9999-9999'],
        ['nombre' => 'Austria', 'siglas' => 'AT', 'codigo_area' => '43', 'mask' => '9-999-9999'],
        ['nombre' => 'Bélgica', 'siglas' => 'BE', 'codigo_area' => '32', 'mask' => '9999-9999'],
        ['nombre' => 'Belice', 'siglas' => 'BZ', 'codigo_area' => '501', 'mask' => '999-9999'],
        ['nombre' => 'Bolivia', 'siglas' => 'BO', 'codigo_area' => '591', 'mask' => '9999-9999'],
        ['nombre' => 'Brasil', 'siglas' => 'BR', 'codigo_area' => '55', 'mask' => '99-9999-9999'],
        ['nombre' => 'Canadá', 'siglas' => 'CA', 'codigo_area' => '1', 'mask' => '999-999-9999'],
        ['nombre' => 'Catar', 'siglas' => 'QA', 'codigo_area' => '974', 'mask' => '9999-9999'],
        ['nombre' => 'Chile', 'siglas' => 'CL', 'codigo_area' => '562', 'mask' => '9999-9999'],
        ['nombre' => 'China', 'siglas' => 'CN', 'codigo_area' => '86', 'mask' => '99-99999999'],
        ['nombre' => 'Colombia', 'siglas' => 'CO', 'codigo_area' => '57', 'mask' => '99-9999-9999'],
        ['nombre' => 'Corea del Sur', 'siglas' => 'KR', 'codigo_area' => '82', 'mask' => '9999-9999'],
        ['nombre' => 'Costa Rica', 'siglas' => 'CR', 'codigo_area' => '506', 'mask' => '9999-9999'],
        ['nombre' => 'Cuba', 'siglas' => 'CU', 'codigo_area' => '53', 'mask' => '999-9999'],
        ['nombre' => 'Ecuador', 'siglas' => 'EC', 'codigo_area' => '593', 'mask' => '9999-9999'],
        ['nombre' => 'España', 'siglas' => 'ES', 'codigo_area' => '34', 'mask' => '999-999-999'],
        ['nombre' => 'Estados Unidos', 'siglas' => 'US', 'codigo_area' => '1', 'mask' => '999-999-9999'],
        ['nombre' => 'Francia', 'siglas' => 'FR', 'codigo_area' => '33', 'mask' => '99-9-9999-9999'],
        ['nombre' => 'Guatemala', 'siglas' => 'GT', 'codigo_area' => '502', 'mask' => '9999-9999'],
        ['nombre' => 'Honduras', 'siglas' => 'HN', 'codigo_area' => '504', 'mask' => '9999-9999'],
        ['nombre' => 'India', 'siglas' => 'IN', 'codigo_area' => '91', 'mask' => '99-9999-9999-99'],
        ['nombre' => 'Israel', 'siglas' => 'IL', 'codigo_area' => '972', 'mask' => '999-9999'],
        ['nombre' => 'Italia', 'siglas' => 'IT', 'codigo_area' => '39', 'mask' => '99-999-9999'],
        ['nombre' => 'Japón', 'siglas' => 'JP', 'codigo_area' => '81', 'mask' => '9-9999-9999'],
        ['nombre' => 'Marruecos', 'siglas' => 'MA', 'codigo_area' => '212', 'mask' => '99-999-9999'],
        ['nombre' => 'México', 'siglas' => 'MX', 'codigo_area' => '52', 'mask' => '99-9999-9999'],
        ['nombre' => 'Nicaragua', 'siglas' => 'NI', 'codigo_area' => '505', 'mask' => '9999-9999'],
        ['nombre' => 'Noruega', 'siglas' => 'NO', 'codigo_area' => '47', 'mask' => '9999-9999'],
        ['nombre' => 'Países Bajos', 'siglas' => 'NL', 'codigo_area' => '31', 'mask' => '99-999-9999'],
        ['nombre' => 'Panamá', 'siglas' => 'PA', 'codigo_area' => '507', 'mask' => '9999-9999'],
        ['nombre' => 'Perú', 'siglas' => 'PE', 'codigo_area' => '51', 'mask' => '9999-9999'],
        ['nombre' => 'Portugal', 'siglas' => 'PT', 'codigo_area' => '351', 'mask' => '999-999-999'],
        ['nombre' => 'Reino Unido', 'siglas' => 'GB', 'codigo_area' => '44', 'mask' => '9999-999999'],
        ['nombre' => 'República Dominicana', 'siglas' => 'DO', 'codigo_area' => '1-809', 'mask' => '999-9999'],
        ['nombre' => 'Rusia', 'siglas' => 'RU', 'codigo_area' => '7', 'mask' => '999-999-9999'],
        ['nombre' => 'Singapur', 'siglas' => 'SG', 'codigo_area' => '65', 'mask' => '9999-9999'],
        ['nombre' => 'Suecia', 'siglas' => 'SE', 'codigo_area' => '46', 'mask' => '9-999-9999'],
        ['nombre' => 'Suiza', 'siglas' => 'CH', 'codigo_area' => '41', 'mask' => '9-99-9999-999'],
        ['nombre' => 'Turquía', 'siglas' => 'TR', 'codigo_area' => '90', 'mask' => '999-999-99-99'],
        ['nombre' => 'Uruguay', 'siglas' => 'UY', 'codigo_area' => '598', 'mask' => '9 999-9999'],
        ['nombre' => 'Yemen', 'siglas' => 'YE', 'codigo_area' => '967', 'mask' => '99-999-9999'],
    ];

      DB::table('pais')->insert($paises);

    }
}
