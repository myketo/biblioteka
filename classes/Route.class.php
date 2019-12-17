<?php 
class Route{
    public static $validRoutes = ['search', 'login', 'user', 'admin'];
    public static function loadView(){
        if(isset($_GET['url']) && in_array($_GET['url'], self::$validRoutes)){
            include_once "views/{$_GET['url']}.php";
        }else{
            include_once "views/home.php";
        }
    }
}