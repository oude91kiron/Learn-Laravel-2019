<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

//terminal command>> php artisan make:factory --model=Post 
$factory->define(Post::class, function (Faker $faker) {
    return [
        // create a factory to generate data to our post table.
        'user_id'=> factory('App\User'),
        'title'=> $faker->sentence,
        'post_image'=> $faker->imageUrl('900', '300'),
        'body'=> $faker->paragraph
    ];
});
