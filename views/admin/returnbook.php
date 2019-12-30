Nie znasz ID? <a href='<?= Route::homePage(); ?>/search'>Znajdź książkę</a>

<form method='POST'>
    <input type='text' name='book_id' placeholder='ID książki'>
    <input type='submit' name='returnSubmit' value='Zwróć'>
</form>

<?php
    if(isset($_POST['returnSubmit'])){
        // $book = $booksController->getBorrowedBooks($_POST['input']);
        // $penelty = $userController->checkPenelty($book[0]['return_date']);
        // echo "Kara za przetrzymanie: $penelty zł.";

        $book = new BooksView;
        $book->returnBookView($_POST['book_id']);
    }
?>