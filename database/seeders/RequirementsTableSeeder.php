<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RequirementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('requirements')->delete();
        
        \DB::table('requirements')->insert(array (
            0 => 
            array (
                'requirements_id' => 3,
                'name' => 'Backend Dev',
                'project_id' => 2,
                'created_at' => '2021-10-20 08:21:54',
                'updated_at' => '2021-10-20 08:21:54',
            ),
            1 => 
            array (
                'requirements_id' => 4,
                'name' => 'FrontEnd Dev',
                'project_id' => 2,
                'created_at' => '2021-10-20 08:21:54',
                'updated_at' => '2021-10-20 08:21:54',
            ),
        ));
        
        
    }
}