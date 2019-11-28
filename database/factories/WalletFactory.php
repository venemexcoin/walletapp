<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wallet;
use Faker\Generator as Faker;

$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'money' => $faker->numberBetween($min = 500, $max = 900),
        'cripto' => $faker->numberBetween($min = 0.00100000, $max = 1.59999999)
    ];
});
