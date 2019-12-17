<?php

class AuthController extends Auth{
    public function checkUser($login, $password){
        $user = $this->getUser($login);
        return $user && password_verify($password, $user[0]['password']) ? $user : "";
    }
}