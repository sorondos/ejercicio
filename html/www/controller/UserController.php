<?php

namespace soron2;

class UserController {

    public function __construct() {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public function getAllUser() {
        if(isset($_SESSION['UserEjercio'])){
            return $this->orderArray($_SESSION['UserEjercio']);
        }
    }

    public function orderArray($array) {
        $s= [];
        foreach($array as $i => $obj){
            $s[$i] = $obj->name;
        }

        $s = array_map('strtolower', $s);

        array_multisort($s, SORT_ASC, SORT_STRING, $array);

        return $array;
    }

    public function save($post) {
        $newUser = new UserModel($post['name'], $post['lastname']);
        $_SESSION['UserEjercio'][] = $newUser;
    }


    public function view($view){
        switch($view){
            case 'new' :
                return 'new-user.phtml';
            case 'list' :
                return 'list-user.phtml';
        }
    }

}