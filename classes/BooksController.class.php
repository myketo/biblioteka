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
            <a href=''>Zarezerwuj.</a>";
        }else{
            $borrowedBook = $this->getBorrowedBooks($book['id']);
            $result = "Książka wypożyczona do {$borrowedBook[0]['return_date']} przez {$borrowedBook[0]['users_id']}.";
        }
        
        return $result;
    }
}