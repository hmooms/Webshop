<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use VRSense\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraphs(1, true),
        'price' => random_int(30, 100),
        'category_id' => random_int(1, 5)
    ];
});
