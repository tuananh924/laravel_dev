<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(App\User::class, 5)->create();
    	$faker = Faker::create();

    	$user = User::create([
    		'username' => $faker->username,
    		'password' => $faker->password,
    		'email' => $faker->email,
    		'address' => $faker->address,
    		'phone' => $faker->phone,
    		'active' => $faker->active,
    		'school_id' => $faker->school_id,
    		'skill_id' => $faker->skill_id
    		]);
    }
}
