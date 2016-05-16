<?php

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i <= 10; $i++) {
            DB::table('courses')->insert([
                'title_course' => $faker->company,
                'alias_course' => $faker->name,
            ]);
        }
    }
}
