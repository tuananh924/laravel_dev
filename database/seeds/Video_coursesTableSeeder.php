<?php

use Illuminate\Database\Seeder;

class Video_coursesTableSeeder extends Seeder
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
            DB::table('tbl_video_courses')->insert([
                'course_id' => $faker->randomDigit,
                'video_id' => $faker->randomDigit
            ]);
        }
    }
}
