<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use App\Waffle;
use Faker\Generator as Faker;

$factory->define(Waffle::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'html' => '<h1>It works!</h1>',
        'js' => "console.info('It works!')",
        'css' => 'body { color: #333; }',
        'baker_id' => factory(User::class),
    ];
});
