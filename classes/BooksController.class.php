<?php 

class BooksController extends Books{
    public function findBook($input, $column){
        if(empty($input) || $column !== "title" && $column !== "author") return;
        $input = "%$input%";
        $results = $this->getBook($input, $column);

        return $results;
    }

    public function checkAvailability($book){
        if($book['availability']){
            $result = "Książka dostępna.
            <a href='borrow?id={$book['id']}'>Zarezerwuj.</a>";
        }else{
            $borrowedBook = $this->getBorrowedBooks($book['id']);
            $result = "Książka wypożyczona do {$borrowedBook[0]['return_date']} przez {$borrowedBook[0]['users_id']}.";
        }
        
        return $result;
    }

    public function borrowBook($book_id, $user_id, $period){
        $date = new DateTime(date("Y-m-d"));
        $date->modify("+$period month");
        $return_date = $date->format('Y-m-d');
        $this->setBorrowBook($book_id, $user_id, $return_date);

        echo "Pomyślnie zarezerwowano książkę.";
    }
}