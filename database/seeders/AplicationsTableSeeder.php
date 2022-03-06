<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AplicationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aplications')->delete();
        
        \DB::table('aplications')->insert(array (
            0 => 
            array (
                'id' => 1,
                'area_id' => 1,
                'otherArea' => 'Limpieza',
                'subject' => 'Limpiar los basureros de parque Simon',
                'name' => 'Raúl Alberto López Moreno',
                'direction' => 'Acapulco',
                'phone' => '85462264',
                'petition' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quam massa, pharetra nec mollis ut, luctus a lectus. Donec hendrerit nisl ut ipsum condimentum vulputate. Donec et lobortis elit. Nulla sollicitudin vehicula nisl, id eleifend nulla porta ac. Phasellus aliquam ac turpis ac volutpat. Ut vitae risus a purus tincidunt convallis ac at est. Sed a gravida nisl. Mauris arcu nisi, auctor ut aliquet id, pellentesque non tortor. Donec quis enim bibendum mauris fermentum interdum. Aenean tincidunt blandit libero vel gravida. Aenean vitae turpis dignissim lectus ornare scelerisque et sed libero. Vestibulum interdum vitae odio eu porttitor. Suspendisse eget risus tincidunt, bibendum leo a, accumsan neque. Mauris gravida, ipsum id porttitor ullamcorper, lectus ex gravida urna, non hendrerit ipsum erat quis arcu.',
                'inePdf' => 'public/files/bjm8cg8lWj4GLZ6PyOOqP00gevYkjbS45BagFOM9.pdf',
                'curpPdf' => 'public/files/uJC3PYxbWaMgs3xfQLH7z7cukXrY42yGvVeZG4hl.pdf',
                'status' => 'Recibido',
                'proofAddressPdf' => 'public/files/E0ztUZIlKEcFIC9oklqxPvkuLk5l4CHfPpShlulw.pdf',
                'created_at' => '2022-02-25 08:41:16',
                'updated_at' => '2022-02-26 08:41:16',
            ),
            1 => 
            array (
                'id' => 2,
                'area_id' => 8,
                'otherArea' => NULL,
                'subject' => 'Pago no realizado de Servicio',
                'name' => 'Benjamin Mortensen',
                'direction' => 'Madrid -getafe',
                'phone' => '658665863',
                'petition' => 'Phasellus nisi leo, pulvinar quis nisi ut, porttitor varius nunc. Nullam molestie risus at leo lacinia, vitae euismod arcu congue. Nam auctor gravida neque, a scelerisque enim dapibus tincidunt. Ut convallis purus et egestas pulvinar. Ut ac efficitur elit. Nulla facilisi. Maecenas dapibus turpis vitae mi luctus mattis non sed elit. Cras ipsum felis, imperdiet in feugiat at, pulvinar nec eros. Nunc eget aliquam metus.',
                'inePdf' => 'public/files/ndwGuVmQTBvIIXC4s7Uaebo8lGPTipNf6r40mJr7.pdf',
                'curpPdf' => 'public/files/L0mhiOWDVeZj2msh4VtfgDiPeTOe4uLGium5xUPA.pdf',
                'status' => 'Atendido',
                'proofAddressPdf' => 'public/files/BFObdx7cNNzRRC2CkuBN9dCyq25Ym21M0mrAxRtk.pdf',
                'created_at' => '2022-01-26 08:59:11',
                'updated_at' => '2022-02-26 08:59:11',
            ),
            2 => 
            array (
                'id' => 3,
                'area_id' => 6,
                'otherArea' => NULL,
                'subject' => 'CI3 error with query SQLSERVER',
                'name' => 'Bransky',
                'direction' => 'Barcelona',
                'phone' => '4848464',
                'petition' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quam massa, pharetra nec mollis ut, luctus a lectus. Donec hendrerit nisl ut ipsum condimentum vulputate. Donec et lobortis elit. Nulla sollicitudin vehicula nisl, id eleifend nulla porta ac. Phasellus aliquam ac turpis ac volutpat. Ut vitae risus a purus tincidunt convallis ac at est. Sed a gravida nisl. Mauris arcu nisi, auctor ut aliquet id, pellentesque non tortor. Donec quis enim bibendum mauris fermentum interdum. Aenean tincidunt blandit libero vel gravida. Aenean vitae turpis dignissim lectus ornare scelerisque et sed libero. Vestibulum interdum vitae odio eu porttitor. Suspendisse eget risus tincidunt, bibendum leo a, accumsan neque. Mauris gravida, ipsum id porttitor ullamcorper, lectus ex gravida urna, non hendrerit ipsum erat quis arcu.',
                'inePdf' => 'public/files/4VwcsZCZBKgYZGq7zKcQxEzuseAW79uODceavmPH.pdf',
                'curpPdf' => 'public/files/AHDUB2b8LYfjVT10pKu1wpNQmxm3rmLplPwJ6zkD.pdf',
                'status' => 'Recibido',
                'proofAddressPdf' => 'public/files/pwZSYj2JhlZtq3GmaHSI2kU1JeJnLSVs0upGyIXl.pdf',
                'created_at' => '2022-02-24 09:58:29',
                'updated_at' => '2022-02-26 09:58:29',
            ),
            3 => 
            array (
                'id' => 4,
                'area_id' => 3,
                'otherArea' => NULL,
                'subject' => 'Error de Sql server 2018',
                'name' => 'Mario Estrada',
                'direction' => 'Valencia España',
                'phone' => '6898484',
                'petition' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quam massa, pharetra nec mollis ut, luctus a lectus. Donec hendrerit nisl ut ipsum condimentum vulputate. Donec et lobortis elit. Nulla sollicitudin vehicula nisl, id eleifend nulla porta ac. Phasellus aliquam ac turpis ac volutpat. Ut vitae risus a purus tincidunt convallis ac at est. Sed a gravida nisl. Mauris arcu nisi, auctor ut aliquet id, pellentesque non tortor. Donec quis enim bibendum mauris fermentum interdum. Aenean tincidunt blandit libero vel gravida. Aenean vitae turpis dignissim lectus ornare scelerisque et sed libero. Vestibulum interdum vitae odio eu porttitor. Suspendisse eget risus tincidunt, bibendum leo a, accumsan neque. Mauris gravida, ipsum id porttitor ullamcorper, lectus ex gravida urna, non hendrerit ipsum erat quis arcu.',
                'inePdf' => 'public/files/2HRUxzDkK2mA5qPs29ipDzDmbtmAWGqW54OPq34X.pdf',
                'curpPdf' => 'public/files/2aWtVyfhkjWejen0JFJpStJ9wFnKONSrGlgY5x4y.pdf',
                'status' => 'Recibido',
                'proofAddressPdf' => 'public/files/lR4MQcNvDrFKlYVUu3ZQEAOCgwQTVgNXOKCAz97b.pdf',
                'created_at' => '2022-02-26 23:19:18',
                'updated_at' => '2022-02-26 23:19:18',
            ),
            4 => 
            array (
                'id' => 5,
                'area_id' => 3,
                'otherArea' => NULL,
                'subject' => 'Guerra de Ucrania - Rusia',
                'name' => 'putin',
                'direction' => 'Ucrania',
                'phone' => '654648',
                'petition' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quam massa, pharetra nec mollis ut, luctus a lectus. Donec hendrerit nisl ut ipsum condimentum vulputate. Donec et lobortis elit. Nulla sollicitudin vehicula nisl, id eleifend nulla porta ac. Phasellus aliquam ac turpis ac volutpat. Ut vitae risus a purus tincidunt convallis ac at est. Sed a gravida nisl. Mauris arcu nisi, auctor ut aliquet id, pellentesque non tortor. Donec quis enim bibendum mauris fermentum interdum. Aenean tincidunt blandit libero vel gravida. Aenean vitae turpis dignissim lectus ornare scelerisque et sed libero. Vestibulum interdum vitae odio eu porttitor. Suspendisse eget risus tincidunt, bibendum leo a, accumsan neque. Mauris gravida, ipsum id porttitor ullamcorper, lectus ex gravida urna, non hendrerit ipsum erat quis arcu.',
                'inePdf' => 'public/files/lfndkVjy05Sp761ssLkWKdinh9TWTkbIUTflCblo.pdf',
                'curpPdf' => 'public/files/U9SctkXgtUQyAB4G8NyxZCQDVmxUzEHhIQLENIVY.pdf',
                'status' => 'Atendido',
                'proofAddressPdf' => 'public/files/1wLizHiNsIMFMMJ4ClNzcetmYyqrdDQClRlrwFYD.pdf',
                'created_at' => '2022-02-26 23:20:10',
                'updated_at' => '2022-02-26 23:20:10',
            ),
            5 => 
            array (
                'id' => 6,
                'area_id' => 1,
                'otherArea' => 'Mantenimiento',
                'subject' => 'Problemas con aguas estancadas',
                'name' => 'Teresa',
                'direction' => 'Alemania',
                'phone' => '15645456',
                'petition' => 'Phasellus nisi leo, pulvinar quis nisi ut, porttitor varius nunc. Nullam molestie risus at leo lacinia, vitae euismod arcu congue. Nam auctor gravida neque, a scelerisque enim dapibus tincidunt. Ut convallis purus et egestas pulvinar. Ut ac efficitur elit. Nulla facilisi. Maecenas dapibus turpis vitae mi luctus mattis non sed elit. Cras ipsum felis, imperdiet in feugiat at, pulvinar nec eros. Nunc eget aliquam metus.',
                'inePdf' => 'public/files/0JdByZDSm2dj1CzWo2rP1NnrlubF1ZwzxbOFN5H0.pdf',
                'curpPdf' => 'public/files/AaYXiDZ68XKzSBZ9LIv83kJqCRUhkd87enHNUe1Q.pdf',
                'status' => 'Recibido',
                'proofAddressPdf' => 'public/files/rfTmjE3IoEX2hACpSmgHsSOVq2QaVknegXCzDozF.pdf',
                'created_at' => '2022-02-27 08:28:25',
                'updated_at' => '2022-02-27 09:04:42',
            ),
        ));
        
        
    }
}