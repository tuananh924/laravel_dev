<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
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
            DB::table('tbl_admins')->insert([
                'username' => $faker->name,
                'password' => bcrypt('secret'),
                'email' => $faker->unique()->email,
                'active' => $faker->randomDigit,
            ]);
        }
    }
}
