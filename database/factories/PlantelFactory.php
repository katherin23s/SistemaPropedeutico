<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plantel;
use Faker\Generator as Faker;

$factory->define(Plantel::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'direccion' => $faker->streetAddress,
        'telefono' => $faker->phoneNumber,
        'correo' => $faker->safeEmail,
    ];
});
