<section class='user'>
    <h2 class='page_name'><a href='<?= Route::homePage() ?>/user'>Twoje konto</a></h2>

    <?php
        $user = new UserController;
        $user->setUserData($_SESSION['logged_in']);
        echo "<p class='user_data'>$user->name $user->surname, ul. $user->address</p>";
        echo "<p><a href='".Route::homePage()."/user/borrowed'>Wypożyczone</a></p>";
        echo "<div class='user_sub'>";
        Route::loadSubView();
        echo "</div>";
    ?>

    <form method='post'><input type='submit' name='unset' value='wyloguj'></form>
    <?php if(isset($_POST['unset'])){ session_unset(); session_destroy(); } ?>
</section>