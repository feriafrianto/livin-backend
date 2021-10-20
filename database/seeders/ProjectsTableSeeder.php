<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'project_id' => 2,
                'title' => 'Ketoparak',
                'description' => 'Pertunjukan',
                'scale' => '10',
                'deadline' => '2021-10-18 10:34:00',
                'visibility' => 'Public',
                'user_id' => 1,
                'created_at' => '2021-10-20 08:21:54',
                'updated_at' => '2021-10-20 08:21:54',
            ),
        ));
        
        
    }
}