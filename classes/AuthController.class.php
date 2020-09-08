<?php

class AuthController extends Auth{
    public static function checkLoggedIn(){
        if(!isset($_SESSION['logged_in'])){
            if(Route::$url == "user" || Route::$url == "admin"){
                header("Location: ".Route::homePage()."/login");
            }
        }else{
            if(Route::$url == "login"){
                if(isset($_SESSION['is_admin'])){
                    header("Location: ".Route::homePage()."/admin");
                    die();
                }

                header("Location: ".Route::homePage()."/user");
            }
        }
    }

    public function checkUser($login, $password){
        $user = $this->getUser($login);
        
        if(!$user || !password_verify($password, $user[0]['password'])){
            echo "Błędne dane. Spróbuj ponownie.";
            return;
        }

        $_SESSION['logged_in'] = $user[0]['id'];
        if($user[0]['is_admin']) $_SESSION['is_admin'] = 1;
    }
}