<form method='POST'>
    <label for='id'>ID karty: </label>
    <input type='number' name='id' id='id' placeholder='ID karty'><br>

    <label for='name'>Imię: </label>
    <input type='text' name='name' id='name' placeholder='Imię'><br>

    <label for='surname'>Nazwisko: </label>
    <input type='text' name='surname' id='surname' placeholder='Nazwisko'><br>

    <label for='address'>Adres: </label>
    <input type='text' name='address' id='address' placeholder='Adres'><br>

    <input type='submit' name='addUserSubmit' value='Dodaj użytkownika'>
</form>

<?php
    if(isset($_POST['addUserSubmit'])){
        $user = new UserController;
        $user->addUser($_POST);
    }
?>