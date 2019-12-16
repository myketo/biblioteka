<?php

class Books extends Dbh{
    protected function getBook($input, $column){
        $sql = "SELECT * FROM books WHERE $column LIKE ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$input]);
        
        $results = $stmt->fetchAll();
        return $results;
    }
}