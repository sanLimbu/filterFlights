<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookedFlights;
use Faker\Generator as Faker;

$factory->define(BookedFlights::class, function (Faker $faker) {
    return [
        'ItineraryId' => $ItineraryId = $faker->sentence,
        'origin'      => $faker->name,
        'destination' => $faker->name,
        'slug'        => Str::slug($ItineraryId),
        'admin'       => rand(0,1),
        'flightStops' => ['direct','one','Two+'][rand(0,2)],
        'flightType'  => ['economy','business','firstClass'][rand(0,2)],
        'totalCost'   => $faker->randomNumber(4),
    ];
});
