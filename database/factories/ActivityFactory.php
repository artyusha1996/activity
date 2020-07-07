<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Entities\Activity::class, function (Faker $faker) {
    return [
        'city_id' => 1,
        'name' => $faker->name,
        'starts_at' => $faker->time(),
    ];
});
