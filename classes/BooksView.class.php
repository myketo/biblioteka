<?php 

class BooksView extends Books{
    public function showBook($input, $column){
        $controller = new BooksController;
        $books = $controller->findBook($input, $column);
        if(!$books) return;
        
        echo "Znalezione książki: <b>".count($books)."</b><br><br>";
        foreach($books as $book){
            echo "<p>Tytuł: {$book['title']}</p>
            <p>Autor: {$book['author']}</p>
            <p>Wydawnictwo: {$book['publisher']}</p>
            <p>Rok wydania: {$book['release_year']}</p>
            <p>Dostępność: {$book['availability']}</p>";
        }
    }
}