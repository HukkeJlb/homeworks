<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 3; $i++) {
            $category = new App\Category();
            $category->name = $faker->word;
            $category->description = $faker->text;
            $category->save();
        }

    }
}
