<?php

class Books extends Dbh{
    protected function getBook($input, $column="id"){
        $sql = "SELECT * FROM books WHERE $column LIKE ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$input]);
        
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getBorrowedBooks($id){
        $sql = "SELECT * FROM users_books INNER JOIN users ON `users_books`.`users_id` = `users`.`id` INNER JOIN books ON `users_books`.`books_id` = `books`.`id` WHERE books_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function setBorrowBook($book_id, $user_id, $return_date){
        $sql = "INSERT INTO users_books(users_id, books_id, return_date) VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id, $book_id, $return_date]);

        $sql = "UPDATE books SET `availability`=0 WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_id]);
    }
}