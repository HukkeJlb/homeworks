<?php
require "./vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'CustomMarket',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

class Category extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;

//    public function goods()
//    {
//        return $this->hasMany('Good', 'category_id', 'id');
//    }
}

class Good extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}