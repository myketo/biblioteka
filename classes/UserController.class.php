<?php

class UserController extends User{
    public $id;
    public $name;
    public $surname;
    public $address;

    public function setUserData($id){
        $auth = new Auth;
        $user = $auth->getUser($id);

        $this->id = $id;
        $this->name = $user[0]['name'];
        $this->surname = $user[0]['surname'];
        $this->address = $user[0]['address'];
    }

    public function checkPenelty($return_date){
        $date = new DateTime(date("Y-m-d"));
        $return_date = new DateTime($return_date);
        $diff = $return_date->diff($date)->format("%r%a");

        if($diff<0) return 0;

        $penelty = 10;
        
        $result = ($diff*$penelty)/100;
        if(is_float($result)) $result.="0";

        return $result;
    }

    public function addUser($user){
        if(empty($user['id']) || empty($user['name']) || empty($user['surname']) || empty($user['address'])){
            echo "Wszystkie pola są wymagane.";
            return;
        }

        if(strlen($user['id']) != 5){
            echo "Podaj prawidłowe ID karty.";
            return;
        }

        if($this->checkExists($user['id'])){
            echo "Ta karta została już zarejestrowana.";
            return;
        }

        $this->setAddUser($user);
        echo "Dodano użytkownika!";
    }

    public function checkUser($user){
        if(empty($user['id']) || empty($user['name']) || empty($user['surname']) || empty($user['address'])){
            echo "Wszystkie pola są wymagane.";
            return;
        }

        if(strlen($user['id']) != 5){
            echo "Podaj prawidłowe ID karty.";
            return;
        }

        if(!$this->findUser($user)){
            echo "Nie znaleziono użytkownika o podanych danych.";
            return;
        }

        return $user['id'];
    }

    public function setPassword($password, $password2, $id){
        if(empty($password) || empty($password2)){
            echo "Wszystkie pola są wymagane.";
            return;
        }

        if(strlen($password)<5 || strlen($password)>20){
            echo "Hasło musi zawierać od 5 do 20 znaków.";
            return;
        }

        if($password != $password2){
            echo "Hasła muszą być takie same.";
            return;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->setUserPassword($id, $password);

        unset($_SESSION['activate']);
        echo "Pomyślnie aktywowano konto! Możesz się <a href=".Route::homePage()."/login'>zalogować.</a>";
    }
}