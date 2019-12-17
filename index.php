<?php
include "includes/autoloader.inc.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteka</title>
</head>
<body>
<h1><a href='<?= $_SERVER['PHP_SELF']; ?>'>Biblioteka</a></h1>
    <?php Route::loadView(); ?>
</body>
</html>