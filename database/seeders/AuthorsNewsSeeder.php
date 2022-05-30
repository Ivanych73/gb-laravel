<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class AuthorsNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 180; $i++) {
            DB::table('authors_news')->insert([
                'news_id' => $faker->numberBetween(1, 120),
                'author_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
