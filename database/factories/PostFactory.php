<?php

use Faker\Generator as Faker;

use App\User;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->realText(30);
    $caption = $faker->realText(50);
    $userCount = User::count();

    return [
        'title' => $title,
        'caption' => $caption,
        'price' => random_int(10000, 100000),
        'image' => str_random(10).'.png',
        'user_id' => random_int(1, $userCount)
    ];
});
