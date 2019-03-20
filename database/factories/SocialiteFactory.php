<?php

use Faker\Generator as Faker;

$factory->define(App\Socialite::class, function (Faker $faker) {
    $media=['facebook','twitter','youtube','instagram','dribbble','linkedin'];
    return [
        'social_media'=>$media[$faker->numberBetween(0,5)],
        'link'=>$faker->url
    ];
});
