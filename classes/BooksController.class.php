<?php 

class BooksController extends Books{
    public function findBook($input, $column){
        if(empty($input) || $column !== "title" && $column !== "author") return;
        $input = "%$input%";
        $results = $this->getBook($input, $column);
        return $results;
    }
}