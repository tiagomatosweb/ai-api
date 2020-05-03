<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnalyticType;
use App\Model;
use App\Property;
use App\PropertyAnalytic;
use Faker\Generator as Faker;

$factory->define(PropertyAnalytic::class, function (Faker $faker) {
    return [
        'property_id'      => Property::inRandomOrder()->first()->id,
        'analytic_type_id' => AnalyticType::inRandomOrder()->first()->id,
        'value'            => $faker->randomNumber()
    ];
});
