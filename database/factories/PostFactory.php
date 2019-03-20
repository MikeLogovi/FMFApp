<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'=>Str::random(10),
        'description'=>$faker->paragraph,
        'author'=>$faker->name,
        'written_at'=>rand(2016,2020).'-'.rand(01,12).'-'.rand(1,28),
        'attached_image'=>'/posts/img/'.$faker->numberBetween(1,14).'.'.'jpg',
        'attached_link'=>$faker->url,
        'attached_file'=>'/posts/files/1.pdf'
    ];
});
