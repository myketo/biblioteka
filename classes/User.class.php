<?php

class User extends Dbh{
    public function getUsersBorrowed($id){
        $sql = "SELECT `books`.`title` AS title, `books`.`author` AS author, return_date FROM users_books INNER JOIN users ON `users_books`.`users_id` = `users`.`id` INNER JOIN books ON `users_books`.`books_id` = `books`.`id` WHERE users_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $books = $stmt->fetchAll();
        return $books;
    }

    protected function checkExists($id){
        $sql = "SELECT id FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $id = $stmt->fetchAll();
        return $id;
    }

    protected function setAddUser($user){
        $sql = "INSERT INTO users(`id`, `name`, `surname`, `address`) VALUES(?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user['id'], $user['name'], $user['surname'], $user['address']]);
    }

    protected function findUser($user){
        $sql = "SELECT `id`, `password` FROM users WHERE `id` = ? AND `name` = ? AND `surname` = ? AND `address` = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user['id'], $user['name'], $user['surname'], $user['address']]);

        $result = $stmt->fetchAll();
        return empty($result[0]['password']) ? 1 : 0;
    }

    protected function setUserPassword($id, $password){
        $sql = "UPDATE users SET `password` = ? WHERE `id` = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$password, $id]);
    }
}