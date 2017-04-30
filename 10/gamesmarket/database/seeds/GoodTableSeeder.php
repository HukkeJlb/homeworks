<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $good = new App\Good();
            $good->category_id = rand(1, 3);
            $good->name = $faker->word;
            $good->description = $faker->text;
            $good->price = rand(1, 1000);
            $good->save();
        }
    }
}
