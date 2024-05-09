<?php 
class Controller {
    public function Model($model){
        require_once "./src/models/".$model.".php";
        return new $model;
    }

    public function View($view,$data){
        require_once "./src/views/".$view.".php";
    }
}
?>