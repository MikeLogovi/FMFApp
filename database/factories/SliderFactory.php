<?php

use Faker\Generator as Faker;

$factory->define(App\Slider::class, function (Faker $faker) {
    return [
        'title'=>$faker->name,
        'subtitle'=>$faker->firstName,
        'source'=>'/slide/img/'.$faker->numberBetween(1,14).'.'.'jpg'
    ];
});
