<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Activo',
                'created_at' => '2017-11-28 06:02:52',
                'updated_at' => '2017-11-28 06:02:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cancelado',
                'created_at' => '2017-11-28 06:03:06',
                'updated_at' => '2017-11-28 06:03:06',
            ),
        ));
        
        
    }
}