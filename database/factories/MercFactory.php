<?php

use Faker\Generator as Faker;

$factory->define(App\Merc::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'skin' => $faker->slug,
        'weapon' => $faker->slug,
    ];
});
