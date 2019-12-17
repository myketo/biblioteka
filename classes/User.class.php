<?php

class User extends Dbh{
    public $name;
    public $surname;
    public $address;

    public function userData($id){
        $auth = new Auth;
        $user = $auth->getUser($id);

        $this->name = $user[0]['name'];
        $this->surname = $user[0]['surname'];
        $this->address = $user[0]['address'];
    }
}