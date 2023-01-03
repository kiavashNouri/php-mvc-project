<?php

class Controller
{
    public function __construct()
    {
        session_start();
    }

    public function model($model)
    {
        require_once "../app/models/" . ucwords($model) . ".php";
        $model = ucwords($model);
        return new $model;
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('page not found');
        }
    }

    public function uploadImage($path, $image)
    {
        $path = "../public/images/" . $path;
        if (!file_exists($path)) {
            mkdir($path);
        }
        $image_name = time() . $image['name'];
        $directory = $path . "/" . $image_name;

        move_uploaded_file($image['tmp_name'], $directory);

        return $image_name;

    }
}
