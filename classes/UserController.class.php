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
}