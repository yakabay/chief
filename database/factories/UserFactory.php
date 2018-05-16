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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'position' => function() {
			$positions = ['director', 'top manager', 'manager', 'employee',];
			$randomKey = array_rand($positions);
			return $positions[$randomKey];
		},
        'employment_date' => $faker->date(),
        'salary' => function() {
        	return rand(5, 100)*100;
        },
        'chief_id' => function() {
        	return rand(1, 20);
        },
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});
