<h1>Strona główna</h1>
<a href='search'>Szukaj</a>
<a href='login'><?= isset($_SESSION['logged_in']) ? isset($_SESSION['is_admin']) ? "ADMIN PANEL" : "Konto" : "Zaloguj"; ?></a>