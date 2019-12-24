<?php

class AuthController extends Auth{
    public static function checkLoggedIn(){
        if(!isset($_SESSION['logged_in'])){
            if(Route::$url == "user" || Route::$url == "borrow"){
                header("Location: ".Route::homePage()."/login");
            }
        }else{
            if(Route::$url == "login"){
                header("Location: ".Route::homePage()."/user");
            }
        }
    }

    public function checkUser($login, $password){
        $user = $this->getUser($login);
        return $user && password_verify($password, $user[0]['password']) ? $user : "";
    }
}