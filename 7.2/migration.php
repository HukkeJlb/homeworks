<?php
require('config.php');

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('categories', function ($table) {
    $table->increments('id');
    $table->string('name')->nullable();
    $table->text('description')->nullable();
});
Capsule::schema()->create('goods', function ($table) {
    $table->increments('id');
    $table->integer('category_id')->unsigned();
    $table->integer('article')->nullable();
    $table->string('name')->nullable();
    $table->text('description')->nullable();
    $table->float('price')->nullable();
    $table->string('discount')->default(0);
    $table->integer('purchased')->default(0);
});