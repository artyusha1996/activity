<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Entities\City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
    ];
});
