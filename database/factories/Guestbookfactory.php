<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guestbook;
use Faker\Generator as Faker;

$factory->define(Guestbook::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        "text" => $faker->text
    ];
});
