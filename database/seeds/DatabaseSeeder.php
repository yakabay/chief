<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class)->create([
    		'position' => 'CEO',
    		'chief_id' => 0,
    		'email' => 'ceo@mail.com',
    	]);
    	factory(App\User::class, 9)->create([
    		'chief_id' => 1,
    		'position' => 'director',
    	]);
    	factory(App\User::class, 90)->create([
    		'chief_id' => function() {
    			return rand(1, 9);
    		},
    		'position' => 'top manager',
    	]);
    	factory(App\User::class, 300)->create([
    		'chief_id' => function() {
    			return rand(11, 90);
    		},
    		'position' => 'manager',
    	]);
    	factory(App\User::class, 600)->create([
    		'chief_id' => function() {
    			return rand(101, 300);
    		},
    		'position' => 'employee',
    	]);
    }
}
