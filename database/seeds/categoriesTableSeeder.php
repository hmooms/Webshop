<?php

use Illuminate\Database\Seeder;
use VRSense\category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('description'=>'Action'),
            array('description'=>'RPG'),
            array('description'=>'Horror'),
            array('description'=>'Puzzle'),
            array('description'=>'Multiplayer'),
        );

        category::insert($data);
    }
}
