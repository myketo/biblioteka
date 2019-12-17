<h1>Twój profil</h1>
<?php
$user = new User;
$user->userData($_SESSION['logged_in']);
echo $user->name;