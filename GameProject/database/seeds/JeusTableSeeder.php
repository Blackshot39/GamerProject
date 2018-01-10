<?php

use Illuminate\Database\Seeder;

class JeusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jeus')->delete();
        
        \DB::table('jeus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Halo 1',
                'description' => '<p>desc h1</p>',
                'dateSortie' => '2018-01-19',
                'photo' => NULL,
                'created_at' => '2018-01-10 15:01:22',
                'updated_at' => '2018-01-10 15:01:22',
                'pegi' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'halo 2',
                'description' => '<p>desc 2</p>',
                'dateSortie' => '2018-01-12',
                'photo' => NULL,
                'created_at' => '2018-01-10 15:01:47',
                'updated_at' => '2018-01-10 15:01:47',
                'pegi' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Halo 3',
                'description' => '<p>desc 3</p>',
                'dateSortie' => '2018-01-14',
                'photo' => NULL,
                'created_at' => '2018-01-10 15:02:02',
                'updated_at' => '2018-01-10 15:02:02',
                'pegi' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Halo 4',
                'description' => '<p>desc 4</p>',
                'dateSortie' => '2018-01-28',
                'photo' => NULL,
                'created_at' => '2018-01-10 15:02:17',
                'updated_at' => '2018-01-10 15:02:17',
                'pegi' => NULL,
            ),
        ));
        
        
    }
}