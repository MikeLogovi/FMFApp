<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'fullName'=>$faker->name,
        'comment'=>$faker->paragraph,
        'avatar'=>'/comments/avatars/'.$faker->numberBetween(1,14).'.'.'jpg'
    ];
});
