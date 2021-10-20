<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProgressTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('progress')->delete();
        
        \DB::table('progress')->insert(array (
            0 => 
            array (
                'progress_id' => 2,
                'name' => 'Membuat Panggung',
                'project_id' => 2,
                'created_at' => '2021-10-20 08:22:56',
                'updated_at' => '2021-10-20 08:22:56',
            ),
        ));
        
        
    }
}