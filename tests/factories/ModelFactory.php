<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Tests\Fixtures\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Matthewbdaly\LaravelComments\Eloquent\Models\Comment::class, function (Faker $faker) {
    return [
        'comment' => 'Hello there',
        'user_id' => 1,
        'user_name' => 'Bob Smith',
        'user_email' => 'bob@example.com',
        'user_url' => 'http://bob.com',
        'ip_address' => '192.168.1.1',
        'is_public' => true,
        'is_removed' => false,
    ];
});
