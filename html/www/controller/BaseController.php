<?php

namespace soron2;

class BaseController {

    public $page = [];
    public $controller = NULL;
    public $view = NULL;
    public string $action;

    public function __construct() {
        $page = trim($_SERVER['REQUEST_URI'], '/');
        $page = explode('/', $page);

        $this->page = $page;

        $this->getController();
        $this->getView();
    }

    public function getController() {
        if(!empty($this->page)){
            $controller = '\soron2\\'.ucwords($this->page[0]).'Controller';
            if(class_exists($controller)){
                $this->controller = new $controller();
            }
        }

        return $this->controller;
    }

    public function getView() {
        if($this->controller && isset($this->page[1])){
            if(method_exists($this->controller, 'view')){
                $this->view = call_user_func_array([$this->controller, 'view'], [$this->page[1]]);
            }
        }

        return $this->view;
    }

    public function render() {
        include 'view/header.phtml';

        if($this->view){
            $view = 'view/'.$this->view;

            if(file_exists($view)){
                include $view;
            }
            else{
                echo 'ERROR, fichero no encontrado';
            }
        }
        else{
            echo 'ERROR';
        }

        include 'view/footer.phtml';
    }

    public function actions() {
        if(isset($_POST['action'])){
            $this->action = $_POST['action'];

            if($this->controller){
                if(method_exists($this->controller, $this->action)){
                    return call_user_func_array([$this->controller, $this->action], [$_POST]);
                }
                else{
                    return "Error 125";
                }
            }
        }
    }

}