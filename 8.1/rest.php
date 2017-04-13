<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == "GET") {
echo Good::join('categories', 'goods.category_id', '=', 'categories.id')
        ->select('categories.id as ID', 'categories.name as NAME', 'categories.description as DESCRIPTION', 'goods.*')
        ->get()
        ->toJson();
}