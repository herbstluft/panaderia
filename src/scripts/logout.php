<?php
use MyApp\data\Database;
require("../../vendor/autoload.php");
$db = new Database();

session_start();

session_destroy();
header("Location: /src/views/user/login.php");
exit();
?>
