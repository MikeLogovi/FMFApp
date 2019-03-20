<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    $categories=[1=>'Official events',
             2=>'Social events',
             3=>'Portraits',
             4=>'Travel'];
    $valeur=null;  
    
    return [
        'name'=>$faker->name,
        'source'=>'/img/'.rand(1,14).'.'.'jpg',
        'category_id'=>$valeur=rand(1,4),
        'category_name'=>$categories[$valeur]
    ];
});
