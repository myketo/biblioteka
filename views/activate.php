<form method='POST'>
    <label for='id'>ID karty: </label>
    <input type='number' name='id' id='id' placeholder='ID karty'><br>

    <label for='name'>Imię: </label>
    <input type='text' name='name' id='name' placeholder='Imię'><br>

    <label for='surname'>Nazwisko: </label>
    <input type='text' name='surname' id='surname' placeholder='Nazwisko'><br>

    <label for='address'>Adres: </label>
    <input type='text' name='address' id='address' placeholder='Adres'><br>

    <input type='submit' name='checkUserSubmit' value='Dalej'>
</form>

<?php
    if(isset($_POST['userPasswordSubmit'])){
        $user = new UserController;
        $user->setPassword($_POST['password'], $_POST['password2'], $_SESSION['activate']);
    }
    
    if(isset($_POST['checkUserSubmit']) || isset($_SESSION['activate'])){
        $user = new UserView;
        $user->activateAcc($_POST);
    }
?>