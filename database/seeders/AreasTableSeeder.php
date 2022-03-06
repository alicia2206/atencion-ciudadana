<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('areas')->delete();

        \DB::table('areas')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'OTROS - ESPECIFICAR',
                'created_at' => '2022-02-24 06:28:28',
                'updated_at' => '2022-02-24 08:17:05',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'COORDINACIÓN GENERAL DE SERVICIOS PÚBLICOS MUNICIPALES',
                'created_at' => '2022-02-24 06:28:40',
                'updated_at' => '2022-02-24 06:28:41',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'SECRETARÍA DEL BIENESTAR',
                'created_at' => '2022-02-24 06:28:51',
                'updated_at' => '2022-02-24 06:28:51',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'DIRECCIÓN GENERAL DE ECOLOGÍA Y PROTECCIÓN AL MEDIO AMBIENTE',
                'created_at' => '2022-02-24 06:29:41',
                'updated_at' => '2022-02-24 06:29:41',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'SECRETARÍA DE DESARROLLO URBANO Y OBRAS PÚBLICAS',
                'created_at' => '2022-02-24 06:29:51',
                'updated_at' => '2022-02-24 06:29:51',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'SECRETARIA DE SEGURIDAD PÚBLICA',
                'created_at' => '2022-02-24 06:30:01',
                'updated_at' => '2022-02-24 08:02:39',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'COORDINACIÓN GENERAL DE MOVILIDAD Y TRANSPORTE',
                'created_at' => '2022-02-24 06:30:11',
                'updated_at' => '2022-02-24 06:30:11',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'SECRETARÍA DE PLANEACIÓN Y DESARROLLO ECONÓMICO',
                'created_at' => '2022-02-24 06:30:20',
                'updated_at' => '2022-02-24 06:30:20',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'SECRETARIA DE TURISMO MUNICIPAL',
                'created_at' => '2022-02-24 06:30:29',
                'updated_at' => '2022-02-24 06:30:30',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'DIRECCIÓN GENERAL DE SALUD MUNICIPAL',
                'created_at' => '2022-02-24 06:30:39',
                'updated_at' => '2022-02-24 06:30:39',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'INSTITUTO MUNICIPAL DE LA MUJER',
                'created_at' => '2022-02-24 06:30:56',
                'updated_at' => '2022-02-24 06:30:57',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'INSTITUTO MUNICIPAL DE LA JUVENTUD',
                'created_at' => '2022-02-24 06:31:06',
                'updated_at' => '2022-02-24 06:31:07',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'DIF ACAPULCO',
                'created_at' => '2022-02-24 06:31:16',
                'updated_at' => '2022-02-24 08:03:28',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'CAPAMA',
                'created_at' => '2022-02-24 06:31:16',
                'updated_at' => '2022-02-24 08:03:28',
            ),
        ));


    }
}
