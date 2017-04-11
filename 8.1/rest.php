<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    echo Good::all()->toJson();
}