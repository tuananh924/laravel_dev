<?php

use Illuminate\Database\Seeder;

class Video_trackingsTableSeeder extends Seeder
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
            DB::table('tbl_video_trackings')->insert([
                'user_id' => $faker->randomDigit,
                'video_id' => $faker->randomDigit,
                'user_video_likes' => $faker->randomDigit,
                'user_video_shares' => $faker->randomDigit,
            ]);
        }
    }
}
