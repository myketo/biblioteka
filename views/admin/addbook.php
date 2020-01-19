<form method='POST'>
    <label for='title'>Tytuł: </label>
    <input type='text' name='title' id='title' placeholder='Tytuł'><br>

    <label for='author'>Autor: </label>
    <input type='text' name='author' id='author' placeholder='Nazwisko, Imię'><br>

    <label for='publisher'>Wydawanictwo: </label>
    <input type='text' name='publisher' id='publisher' placeholder='Wydawnictwo'><br>

    <label for='release_year'>Rok wydania: </label>
    <input type='number' name='release_year' id='release_year' placeholder='Rok wydania'><br>

    <input type='submit' name='addBookSubmit' value='Dodaj książkę'>
</form>

<?php
    if(isset($_POST['addBookSubmit'])){
        $book = new BooksController;
        $book->addBook($_POST);
    }
?>