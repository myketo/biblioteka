<form method='POST'>
    <input type='text' name='book_id' placeholder='ID książki'>
    <input type='submit' name='returnSubmit' value='Zwróć'>
</form>
<br>
<p>Nie znasz ID? <a href='<?= Route::homePage(); ?>/search'>Znajdź książkę</a></p>

<?php
    if(isset($_POST['returnSubmit'])){
        $book = new BooksView;
        $book->returnBookView($_POST['book_id']);
    }
?>