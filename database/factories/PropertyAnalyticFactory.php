<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PropertyAnalytic;
use Faker\Generator as Faker;

$factory->define(PropertyAnalytic::class, function (Faker $faker) {
    return [
        'value' => $faker->randomNumber()
    ];
});
