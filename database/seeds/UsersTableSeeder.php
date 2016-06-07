<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tbl_users')->insert([
                'username' => $faker->name,
                'password' => bcrypt('secret'),
                'email' => $faker->unique()->email,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'active' => $faker->randomDigit,
                'school_id' => $faker->randomDigit,
                'skill_id' => $faker->randomDigit
            ]);
        }
    }
}
