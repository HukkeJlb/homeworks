<?php
session_start();
session_destroy();
header("HTTP/1.1 307 Temporary Redirect");
header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3/index.html");
exit();