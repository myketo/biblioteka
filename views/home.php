<section class='home'>
    <h2 class='page_name'>Strona główna</h2>
    <a href='search'>Szukaj</a>
    <a href='login'><?= isset($_SESSION['logged_in']) ? isset($_SESSION['is_admin']) ? "ADMIN PANEL" : "Konto" : "Zaloguj"; ?></a>
</section>