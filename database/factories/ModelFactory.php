<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '12345',
        'phone' => $faker->phoneNumber,
        'bio' => $faker->paragraph,
        'image' => $faker->imageUrl(128, 128),
        'remember_token' => str_random(60),
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->paragraph,
        'user_id' => 1,
        'completed' => random_int(0,1),
    ];
});