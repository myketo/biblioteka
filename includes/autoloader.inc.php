<?php
spl_autoload_register(("autoLoader"));
function autoLoader($className){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    $path = strpos($url, "includes") !== false ? "../classes/" : "classes/";
    $extension = ".class.php";
    $fullPath = $path.$className.$extension;

    if(!file_exists($fullPath)) return false;

    include_once $fullPath;
}