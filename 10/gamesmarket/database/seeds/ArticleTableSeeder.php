<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $article = new App\Article();
            $article->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $article->text = $faker->text;
            $article->save();
        }
    }
}
