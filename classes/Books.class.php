<?php

class Books extends Dbh{
    protected function getBook($input, $column){
        $sql = "SELECT * FROM books WHERE $column LIKE ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$input]);
        
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getBorrowedBooks($id){
        $sql = "SELECT users_id, return_date FROM users_books INNER JOIN users ON `users_books`.`users_id` = `users`.`id` INNER JOIN books ON `users_books`.`books_id` = `books`.`id` WHERE books_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetchAll();
        return $result;
    }
}