<?php

use Illuminate\Database\Seeder;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('VRSense\product', 100)->create();

        foreach (\VRSense\product::all() as $product)
        {
            $categories = \VRSense\category::inRandomOrder()->take(rand(0,3))->pluck('id');
            $product->categories()->attach($categories);
        }
    }
}
