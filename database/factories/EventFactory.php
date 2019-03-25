<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'source'=>'/events/'.$faker->numberBetween(1,14).'.'.'jpg',
        'title'=>Str::random(10),
        'organized_by'=>$faker->name,
        'organized_at'=>rand(2016,2020).'-'.rand(01,12).'-'.rand(1,28),
        'organization_place'=>$faker->city,
        'description'=>$faker->paragraph,
        'event_state'=>rand(0,2)
    ];
});
