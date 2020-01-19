<form method='POST'>
    <input type='text' name='login' placeholder='Identyfikator'>
    <input type='password' name='password' placeholder='Hasło'>
    <input type='submit' name='loginSubmit' value='Zaloguj'>
</form>

<a href='<?= Route::homePage() ?>/activate'>Aktywuj konto</a>

<?php
    if(isset($_POST['loginSubmit'])){
        $auth = new AuthController;
        $auth->checkUser($_POST['login'], $_POST['password']);
        $auth->checkLoggedIn();
    }
?>