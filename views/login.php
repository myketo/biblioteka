<section class='login'>
    <h2 class='page_name'>Logowanie</h2>

    <form method='POST'>
        <input type='text' name='login' placeholder='Identyfikator'><br>
        <input type='password' name='password' placeholder='Hasło'><br>
        <input type='submit' name='loginSubmit' value='Zaloguj'>
    </form>

    <a href='<?= Route::homePage() ?>/activate'>Aktywuj konto</a>

    <div class='result'>
    <?php
        if(isset($_POST['loginSubmit'])){
            $auth = new AuthController;
            $auth->checkUser($_POST['login'], $_POST['password']);
            $auth->checkLoggedIn();
        }
    ?>
    </div>
</section>