<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(App\About::class, function (Faker $faker) {
    return [
        'title'=>Str::random(10),
        'source'=>'/about/'.$faker->numberBetween(1,14).'.'.'jpg',
        'period'=>rand(2016,2020).'-'.rand(1,12).'-'.rand(1,28),
        'history'=>$faker->paragraph
    ];
});
