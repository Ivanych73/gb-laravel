<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 120; $i++) {
            DB::table('news')->insert([
                'title' => $faker->text(255),
                'annotation' => $faker->text(400),
                'content' => $faker->text(1000),
                'image_url' => $faker->imageUrl,
                'source_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
