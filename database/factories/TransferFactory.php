<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transfer;
use Faker\Generator as Faker;

$factory->define(Transfer::class, function (Faker $faker) {
    return [
        'description' => $faker->text($maxNbChars = 200),
        'amount' => $faker->numberBetween($min = 500, $max = 900),
        'criptoamount' => $faker->numberBetween($min = 0.00090000, $max = 1.39999999),
        'wallet_id' => $faker->randomDigitNotNull,

    ];
});
