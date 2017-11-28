<?php

use Illuminate\Database\Seeder;

class RegistersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('registers')->delete();
        
        \DB::table('registers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cuenta' => 107503000017,
                'destinatario' => 'AYRE TEGUCIGALPA SA',
                'direccion' => 'BARRIO CONCEPCION',
                'municipio' => 'COMAYAGUELA',
                'departamento' => 'FRANCISCO MORAZAN',
                'ruta' => 'C1',
                'status' => 'ENTREGADO',
                'recibe' => 'MIGUEL ANGEL MONCADA',
                'banco' => 83985,
                'created_at' => '2017-11-27 17:25:26',
                'updated_at' => '2017-11-27 17:25:29',
            ),
        ));
        
        
    }
}