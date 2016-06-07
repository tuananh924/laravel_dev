<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
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
            DB::table('tbl_courses')->insert([
                'course_title' => $faker->word,
                'course_slug' => $faker->slug,
                'meta_desc' => $faker->word,
                'meta_key' => $faker->word,
                'parent_id' => $faker->randomDigit,
                'sort_order' => $faker->randomDigit,
                'course_image' => $faker->imageUrl($width = 640, $height = 480),
                'course_video_qty' => $faker->randomDigit,
                'course_user_qty' => $faker->randomDigit
            ]);
        }
    }
}
