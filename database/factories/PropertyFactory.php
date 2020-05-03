<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Property;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'guid'    => Str::uuid(),
        'state'   => $faker->stateAbbr,
        'suburb'  => $faker->city,
        'country' => $faker->country,
    ];
});
