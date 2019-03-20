<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(App\Video::class, function (Faker $faker) {
    $category=[
        2=>'Youtube',
        3=>'Personal videos'
    ];
    return [
        'name'=>Str::random(10),
        'source'=>'/videos/'.$faker->numberBetween(1,3).'.'.'mp4',
        'description'=>$faker->paragraph,
        'category_id'=>$val=$faker->numberBetween(2,3),
        'category_name'=>$category[$val],
        
    ];
});
