<?php
require "config.php";
// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
for ($i = 0; $i < 3; $i++) {
    $category = new Category();
    $category->name = $faker->word;
    $category->description = $faker->text;
    $category->save();
}
for ($i = 0; $i < 10; $i++) {
    $good = new Good();
    $good->category_id = rand(1, 3);
    $good->article = rand(100000, 999999);
    $good->name = $faker->word;
    $good->brand = $faker->company;
    $good->description = $faker->text;
    $good->price = rand(1, 1000);
    $good->discount = rand(0, 20);
    $good->purchased = rand(0, 100);
    $good->save();
}