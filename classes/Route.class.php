<?php 
class Route{
    public static $validRoutes = ['search', 'login', 'activate', 'borrow', 'user', 'admin'];
    public static $userValidRoutes = ['borrowed'];
    public static $adminValidRoutes = ['addbook', 'adduser', 'returnbook'];
    public static $url;
    public static $act;

    public static function loadView(){
        if(isset($_GET['url'])){
            $url = self::cleanUrl($_GET['url']);
            self::$url = $url;

            if(in_array($url, self::$validRoutes)){
                include_once "views/$url.php";
            }

            AuthController::checkLoggedIn();
        }else{
            include_once "views/home.php";
        }
    }

    public static function loadSubView(){
        if(isset($_GET['act'])){
            $url = self::cleanUrl($_GET['act']);
            self::$act = $url;

            if(in_array($url, self::$userValidRoutes)){
                include_once "views/user/$url.php";
            }

            if(isset($_SESSION['is_admin']) && in_array($url, self::$adminValidRoutes)){
                include_once "views/admin/$url.php";
            }
        }
    }

    public static function homePage(){
        $url = $_SERVER['PHP_SELF'];
        $url = str_replace("/index.php", "", $url);
        return $url;
    }

    public function cleanUrl($string){
        $string = str_replace(" ", "-", $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

    // self::strposa($_GET['url'], self::$validRoutes)
    // public function strposa($haystack, $needle, $offset=0){
    //     if(!is_array($needle)) $needle = array($needle);
    //     foreach($needle as $query){
    //         if(strpos($haystack, $query, $offset) !== false) return true;
    //     }
    //     return false;
    // }
}