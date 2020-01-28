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
    <link rel="stylesheet" href="<?= Route::homePage() ?>/styles/style.css">
    <title>Biblioteka</title>
</head>
<body>
    <section class='base'>
        <header>
            <h1 class='banner'>
                <a href='<?= Route::homePage(); ?>'>Biblioteka</a>
            </h1>
        </header>

        <main>
        <?php Route::loadView(); ?>
        </main>

        <footer>
            <p>Program na zaliczenie przedmiotu Podstawy Programowania</p>
            <p>Wykonał: Mikołaj Pięcek</p>
        </footer>
    </section>
</body>
</html>