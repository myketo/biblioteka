<?php

class Auth extends Dbh{
    public function getUser($login){
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$login]);

        $result = $stmt->fetchAll();
        return $result;
    }
}