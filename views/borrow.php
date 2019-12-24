<h1>Rezerwacja ksiązki</h1>
<br>
<?php
    $book_id = isset($_GET['id']) ? $_GET['id'] : 0;
    $user_id = $_SESSION['logged_in'];

    $view = new BooksView;
    $view->borrowBookView($book_id);

    if(isset($_POST['submitBorrow'])){
        $controller = new BooksController;
        $controller->borrowBook($book_id, $user_id, $_POST['period']);
    }