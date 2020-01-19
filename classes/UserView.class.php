<?php

class UserView extends User{
    public $user_id;

    public function __construct($user_id=NULL){
        $this->user_id = $user_id;
    }

    public function showBorrowed(){
        $controller = new UserController;
        $books = $this->getUsersBorrowed($this->user_id);

        echo "Wypożyczone książki: <b>".count($books)."</b><br>";
        foreach($books as $book){
            $book['penelty'] = $controller->checkPenelty($book['return_date']);
            echo "<p>Książka: {$book['title']} - {$book['author']}</p>
            <p>Data do zwrotu: {$book['return_date']}</p>
            <p>Kara za przetrzymanie: {$book['penelty']}zł.</p>";
        }
    }

    public function activateAcc($user){
        $controller = new UserController;
        
        if(isset($_SESSION['activate']) || $id = $controller->checkUser($user)){
            echo "<form method='POST'>
                <label for='password'>Hasło: </label>
                <input type='password' name='password' id='password' placeholder='Hasło'><br>
                <label for='password2'>Powtórz: </label>
                <input type='password' name='password2' id='password2' placeholder='Powtórz hasło'><br>
                <input type='submit' name='userPasswordSubmit' value='Aktywuj konto'>
            </form>";
        }

        $_SESSION['activate'] = $id;
    }
}