<?php

class User extends Dbh{
    public function getUsersBorrowed($id){
        $sql = "SELECT `books`.`title` AS title, `books`.`author` AS author, return_date FROM users_books INNER JOIN users ON `users_books`.`users_id` = `users`.`id` INNER JOIN books ON `users_books`.`books_id` = `books`.`id` WHERE users_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $books = $stmt->fetchAll();
        return $books;
    }
}