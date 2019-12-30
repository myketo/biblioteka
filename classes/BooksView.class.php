<?php 

class BooksView extends Books{
    public function showBook($input, $column){
        $controller = new BooksController;
        $books = $controller->findBook($input, $column);
        if(!$books){ echo "Brak wyników."; return; }
        
        echo "Znalezione książki: <b>".count($books)."</b><br><br>";
        foreach($books as $book){
            $book['availability'] = $controller->checkAvailability($book);
            if(isset($_SESSION['is_admin'])) echo "ID: ".$book['id'];
            echo "<p>Tytuł: {$book['title']}</p>
            <p>Autor: {$book['author']}</p>
            <p>Wydawnictwo: {$book['publisher']}</p>
            <p>Rok wydania: {$book['release_year']}</p>
            <p>Dostępność: {$book['availability']}</p>";
        }
    }

    public function borrowBookView($id){
        $controller = new BooksController;
        $book = $this->getBook($id);
        if(!$book){ echo "Nie znaleziono książki w bazie."; return; }

        echo "<h2>{$book[0]['title']}</h2>
        <h3>{$book[0]['author']}</h3>";

        if(!$book[0]['availability']){echo $controller->checkAvailability($book[0]); return;}

        echo "<form method='POST'>
        <label for='period'>Okres wypożyczenia: </label>
        <select name='period'>
            <option value='1'>1 miesiąc</option>
            <option value='2'>2 miesiące</option>
        </select>
        <input type='submit' name='submitBorrow' value='Zarezerwuj'>
        </form>";
    }

    public function returnBookView($id){
        if(!$id){ echo "Nic nie wpisałeś!"; die(); }

        $controller = new BooksController;
        $penelty = $controller->returnBook($id);

        if($penelty===NULL){ echo "Nie można zwrócić książki."; die(); }

        echo "Zwrócono książkę.<br>";
        if($penelty) echo "Kara za przetrzymanie wynosi: $penelty zł.";
    }
}