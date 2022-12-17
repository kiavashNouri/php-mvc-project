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
}
