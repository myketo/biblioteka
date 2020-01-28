<?php

class Books extends Dbh{
    protected function getBook($input, $column="id"){
        $sql = "SELECT * FROM books WHERE $column LIKE ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$input]);
        
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getBorrowedBooks($id){
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

    protected function deleteReturnBook($book_id){
        $sql = "DELETE FROM users_books WHERE books_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_id]);

        $sql = "UPDATE books SET `availability`=1 WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_id]);
    }

    protected function checkExists($book){
        $sql = "SELECT id FROM books WHERE title = ? AND author = ? AND publisher = ? AND release_year = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book['title'], $book['author'], $book['publisher'], $book['release_year']]);
        
        $result = $stmt->fetchAll();
        if($result){
            return $result[0]['id'];
        }
    }

    protected function setAddBook($book){
        $sql = "INSERT INTO books(title, author, publisher, release_year) VALUES(?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book['title'], $book['author'], $book['publisher'], $book['release_year']]);
    }
}