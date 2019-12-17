<?php

class AuthView extends Auth{
    public function loginUser($login, $password){
        $controller = new AuthController;
        $user = $controller->checkUser($login, $password);
        
        if(!$user){
            echo "Błędne dane. Spróbuj ponownie.";
            die();
        }

        $_SESSION['logged_in'] = $user[0]['id'];

        if($user[0]['is_admin']){
            header("Location: admin");
        }else{
            header("Location: user");
        }
    }
}