<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
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
            DB::table('tbl_videos')->insert([
                'video_title' => $faker->word,
                'videos_slug' => $faker->slug,
                'meta_desc' => $faker->word,
                'meta_key' => $faker->slug,
                'youtube_id' => $faker->randomDigit,
                'course_id' => $faker->randomDigit,
                'embed' => $faker->text,
                'thumbnail' => $faker->word,
                'video_likes' => $faker->randomDigit,
                'video_views' => $faker->randomDigit,
                'video_shares' => $faker->randomDigit,
                'thumbnail_width' => $faker->word,
                'thumbnail_height' => $faker->word
            ]);
        }
    }
}
