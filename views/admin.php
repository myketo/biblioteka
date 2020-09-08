<section class='admin'>
    <h2 class='page_name'>Admin Panel</h2>

    <div class='navigation'>
        <a href='<?= Route::homePage() ?>/admin/returnbook'>Zwróć książkę</a>
        <a href='<?= Route::homePage() ?>/admin/addbook'>Dodaj książkę</a>
        <a href='<?= Route::homePage() ?>/admin/adduser'>Dodaj użytkownika</a>
    </div>

    <div class='admin_sub'>
        <?php Route::loadSubView(); ?>
    </div>

    <form method='post'><input type='submit' name='unset' value='wyloguj'></form>
    <?php if(isset($_POST['unset'])){ session_unset(); session_destroy(); } ?>
</section>