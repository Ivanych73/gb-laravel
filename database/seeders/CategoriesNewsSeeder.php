<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CategoriesNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 240; $i++) {
            DB::table('categories_news')->insert([
                'news_id' => $faker->numberBetween(1, 120),
                'category_id' => $faker->numberBetween(1, 6)
            ]);
        }
    }
}
