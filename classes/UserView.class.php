<?php

class UserView extends User{
    public $user_id;

    public function __construct($user_id){
        $this->user_id = $user_id;
    }

    public function showBorrowed(){
        $controller = new UserController;
        $books = $this->getUsersBorrowed($this->user_id);

        echo "Wypożyczone książki: <b>".count($books)."</b><br>";
        foreach($books as $book){
            $book['penelty'] = $controller->checkPenelty($book['return_date']);
            echo "<p>Książka: {$book['title']}</p>
            <p>Data do zwrotu: {$book['return_date']}</p>
            <p>Kara za przetrzymanie: {$book['penelty']}zł.</p>";
        }
    }
}