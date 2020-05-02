<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnalyticType;
use Faker\Generator as Faker;

$factory->define(AnalyticType::class, function (Faker $faker) {
    return [
        'name'               => $faker->name,
        'units'              => $faker->randomElement([
            'm',
            'm2',
            ':1'
        ]),
        'is_numeric'         => $faker->boolean,
        'num_decimal_places' => $faker->randomDigit,
    ];
});
