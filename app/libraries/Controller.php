<?php

class Controller{
    public function __construct(){


    }

    public function model($model)
    {
        require_once "../app/models/".ucwords($model).".php";
        $model=ucwords($model);
        return new $model;
    }

    public function view($view,$data=[])
    {
        if (file_exists('../app/views/'.$view.'.php')){
            require_once '../app/views/'.$view.'.php';
        }else{
            die('page not found');
        }
    }
}
