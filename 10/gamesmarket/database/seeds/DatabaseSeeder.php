<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ArticleTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(GoodTableSeeder::class);
    }
}
